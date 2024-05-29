{{-- <!-- resources/views/members/create.blade.php --> --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tag felvétele</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Név</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Telefonszám</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="{{ old('phone_number') }}">
            </div>
            <div class="mb-3">
                <label for="zip_code" class="form-label">Irányítószám</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ old('zip_code') }}">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">Város</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Cím</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            <div class="mb-3">
                <label for="member_type_id" class="form-label">Tag típus</label>
                <select class="form-control" id="member_type_id" name="member_type_id" required>
                    <option value="">Válassz típust...</option>
                    @foreach ($memberTypes as $type)
                        <option value="{{ $type->id }}" {{ old('member_type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->type_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tag létrehozása</button>
        </form>
    </div>
@endsection
