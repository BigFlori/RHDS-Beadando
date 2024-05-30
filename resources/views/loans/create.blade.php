@extends('layouts.app')

@section('title')
    Kölcsönzés
@endsection

@section('content')
    <div class="container">
        <h1>Kölcsönzés létrehozása</h1>

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
                <label for="member_id" class="form-label">Tag</label>
                <select class="form-control" id="member_id" name="member_id" required>
                    <option value="">Válassz tagot...</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="inventory_id" class="form-label">Raktáron lévő könyvek</label>
                <select class="form-control" id="inventory_id" name="inventory_id" required>
                    <option value="">Válassz könyvet...</option>
                    @foreach ($inventories as $inventory)
                        <option value="{{ $inventory->id }}" {{ old('inventory_id') == $inventory->id ? 'selected' : '' }}>
                            {{ $inventory->book->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="borrow_date" class="form-label">Kölcsönzés dátuma</label>
                <input type="date" class="form-control" id="borrow_date" name="borrow_date"
                    value="{{ old('borrow_date', date('Y-m-d')) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Kölcsönzés létrehozása</button>
        </form>
    </div>
@endsection
