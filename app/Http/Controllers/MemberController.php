<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberType;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $sortableColumns = ['id', 'name', 'email', 'member_type_id', 'created_at'];
        $sortColumn = $request->get('sort', 'created_at'); // Default sort column
        $sortDirection = $request->get('direction', 'desc'); // Default sort direction

        if (!in_array($sortColumn, $sortableColumns)) {
            $sortColumn = 'created_at';
        }

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'desc';
        }

        $members = Member::with('memberType')->orderBy($sortColumn, $sortDirection)->paginate(10);

        return view('members.index', compact('members', 'sortColumn', 'sortDirection'));
    }

    public function create()
    {
        $memberTypes = MemberType::all();
        return view('members.create', compact('memberTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'phone_number' => 'nullable|string|max:20',
            'zip_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'member_type_id' => 'required|exists:member_types,id',
        ]);

        $member = new Member();
        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->phone_number = $request->input('phone_number');
        $member->zip_code = $request->input('zip_code');
        $member->city = $request->input('city');
        $member->address = $request->input('address');
        $member->member_type_id = $request->input('member_type_id');
        $member->save();

        return redirect()->route('members.index')->with('success', 'Tag sikeresen létrehozva.');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        $memberTypes = MemberType::all();
        return view('members.edit', compact('member', 'memberTypes'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone_number' => 'nullable|string|max:20',
            'zip_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'member_type_id' => 'required|exists:member_types,id',
        ]);

        $member->name = $request->input('name');
        $member->email = $request->input('email');
        $member->phone_number = $request->input('phone_number');
        $member->zip_code = $request->input('zip_code');
        $member->city = $request->input('city');
        $member->address = $request->input('address');
        $member->member_type_id = $request->input('member_type_id');
        $member->save();

        return redirect()->route('members.index')->with('success', 'Tag adatai sikeresen módosítva lettek.');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        // Töröljük a kapcsolódó loan rekordokat
        foreach ($member->loans as $loan) {
            $loan->delete();
        }

        $member->delete();

        return redirect()->route('members.index')->with('success', 'Tag törölve lett.');
    }
}
