<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Inventory;
use App\Models\Loan;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $sortableColumns = ['id', 'member_id', 'inventory_id', 'borrow_date', 'return_date'];
        $sortColumn = $request->get('sort', 'return_date');
        $sortDirection = $request->get('direction', 'asc');

        if (!in_array($sortColumn, $sortableColumns)) {
            $sortColumn = 'id';
        }

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc';
        }

        $loans = Loan::with(['inventory.book', 'member'])
            ->orderBy($sortColumn, $sortDirection)
            ->paginate(10);

        return view('loans.index', compact('loans', 'sortColumn', 'sortDirection'));
    }

    public function create()
    {
        // Tagok fetchelése név szerint rendezve
        $members = Member::orderBy('name')->get();

        // Kölcsönözhető könyvek fetchelése cím szerint rendezve
        $inventories = Inventory::with('book')
            ->where('borrowable', 1)
            ->orderBy(Book::select('title')->whereColumn('books.id', 'inventories.book_id'))
            ->get();

        return view('loans.create', compact('members', 'inventories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'inventory_id' => 'required|exists:inventories,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
        ]);

        $member = Member::find($request->member_id);

        // Get the member type's borrow limit
        $borrowLimit = $member->memberType->borrow_limit;

        // Count the number of books currently borrowed by the member
        $currentBorrowedBooks = Loan::where('member_id', $request->member_id)->count();

        // Check if the member has reached the borrow limit
        if ($borrowLimit != -1 && $currentBorrowedBooks >= $borrowLimit) {
            return redirect()->back()->with('error', 'A kiválasztott tag elérte a maximálisan kikölcsönözhető könyv limitet.');
        }

        // Calculate the return date based on the borrow_day_limit
        $borrowDayLimit = $member->memberType->borrow_day_limit;
        $borrow_date = Carbon::parse($request->borrow_date);
        $returnDate = $borrow_date->addDays($borrowDayLimit);

        $loan = new Loan();
        $loan->inventory_id = $request->inventory_id;
        $loan->member_id = $request->member_id;
        $loan->borrow_date = $request->borrow_date;
        $loan->return_date = $returnDate;
        $loan->save();

        $inventory = Inventory::find($request->inventory_id);
        $inventory->borrowable = 0;
        $inventory->save();

        return redirect()->route('loans.index')->with('success', 'Kölcsönzés létrehozva.');
    }

    public function destroy($id)
    {
        $loan = Loan::find($id);
        if ($loan) {
            $inventory = Inventory::find($loan->inventory_id);
            $inventory->borrowable = 1;
            $inventory->save();

            $loan->delete();

            return redirect()->route('loans.index')->with('success', 'Kölcsönzés sikeresen lezárva.');
        }

        return redirect()->route('loans.index')->with('error', 'Nem található a kölcsönzés.');
    }
}
