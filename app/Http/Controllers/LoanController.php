<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Inventory;
use App\Models\Loan;
use App\Models\Member;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $sortableColumns = ['id', 'member_id', 'inventory_id', 'borrow_date', 'return_date'];
        $sortColumn = $request->get('sort', 'borrow_date');
        $sortDirection = $request->get('direction', 'desc');

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
        $members = Member::orderBy('name')->get();
        $inventories = Inventory::with('book')->orderBy(Book::select('title')->whereColumn('books.id', 'inventories.book_id'))->get();
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

        Loan::create($request->all());

        return redirect()->route('loans.index')->with('success', 'Kölcsönzés létrehozva.');
    }

    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return redirect()->route('loans.index')->with('success', 'Kölcsönzés sikeresen lezárva.');
    }
}
