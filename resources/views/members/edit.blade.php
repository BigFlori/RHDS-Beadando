@extends('layouts.app')

@section('title')
Tag szerkesztése
@endsection

{{-- id, type_id, name, email, phone_number, zip_code, city, address --}}
@section('content')
<div class="container-lg mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Tag szerkesztése</h1>
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="id">ID</label>
                    <select class="form-control" id="id" name="id" required>
                        <option value="">Válassz ID</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>

                    <label for="type_id">Típus</label>
                    <select class="form-control" id="type_id" name="type_id" required>
                        <option value="">Válassz típust</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>

                    <label for="name">Név</label>
                    <input type="text" class="form-control" id="name" name="name" required>

                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>

                    <label for="phone_number">Telefonszám</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>

                    <label for="zip_code">Irányítószám</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code" required>

                    <label for="city">Település</label>
                    <input type="number" class="form-control" id="city" name="city" required>

                    <label for="address">Cím</label>
                    <input type="number" class="form-control" id="address" name="address" required>

                    <button type="submit" class="btn btn-primary mt-3">Módosítás</button>

                    @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                    @endif

                </div>
            </form>
        </div>
    </div>
</div>
@endsection