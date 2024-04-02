@extends('layouts.app')

@section('title')
    Új tag
@endsection

{{-- type_id, name, email, phone_number, zip_code, city, address --}}
@section('content')
    <div class="container-lg mt-3">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">Új tag</h1>
                <form method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Név *</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Típus *</label>
                        <select class="form-control" id="type" name="type_id" required>
                            <option value="">Válassz egy típust</option>
                            <option value="1">Típus 1</option>
                            <option value="2">Típus 2</option>
                            <option value="3">Típus 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail cím *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefonszám</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="zip_code">Irányítószám *</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                    </div>
                    <div class="form-group">
                        <label for="city">Település *</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Cím *</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Mentés</button>
                </form>
            </div>
        </div>
    </div>
@endsection
