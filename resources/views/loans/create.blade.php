@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Loan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('loans.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="member_id" class="form-label">Member</label>
                <select class="form-control" id="member_id" name="member_id" required>
                    <option value="">Select Member</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="inventory_id" class="form-label">Book Inventory</label>
                <select class="form-control" id="inventory_id" name="inventory_id" required>
                    <option value="">Select Book</option>
                    @foreach ($inventories as $inventory)
                        <option value="{{ $inventory->id }}" {{ old('inventory_id') == $inventory->id ? 'selected' : '' }}>
                            {{ $inventory->book->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="borrow_date" class="form-label">Borrow Date</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date"
                    value="{{ old('borrow_date') }}" required>
            </div>
            <div class="mb-3">
                <label for="return_date" class="form-label">Return Date</label>
                <input type="date" class="form-control" id="return_date" name="return_date"
                    value="{{ old('return_date') }}">
            </div>
            <button type="submit" class="btn btn-primary">Create Loan</button>
        </form>
    </div>
@endsection
