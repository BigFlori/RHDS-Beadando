@extends('layouts.app')

@section('title')
Kölcsönzés
@endsection

@section('content')
<div class="container-lg mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Kölcsönzés</h1>
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="member_id">Tag ID</label>
                    <select class="form-control" id="member_id" name="member_id" required>
                        <option value="">Válassz tagot</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>

                    <label for="book_id">Könyv ID</label>
                    <select class="form-control" id="book_id" name="book_id" required>
                        <option value="">Válassz könyvet</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>

                    <label for="rent_date">Kölcsönzés dátuma</label>
                    <input type="date" class="form-control" id="rent_date" name="rent_date" required>

                    <label for="return_date">Visszavétel dátuma</label>
                    <input type="date" class="form-control" id="return_date" name="return_date" required disabled>

                    <button type="submit" class="btn btn-primary mt-3">Kölcsönzés</button>

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