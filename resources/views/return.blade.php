@extends('layouts.app')

@section('title')
Visszavétel
@endsection

@section('content')
<div class="container-lg mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Kölcsönzés visszavétele</h1>
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
                    <input type="date" class="form-control" id="rent_date" name="rent_date" required disabled>

                    <label for="return_date">Visszavétel dátuma</label>
                    <input type="date" class="form-control" id="return_date" name="return_date" required>

                    <button type="submit" class="btn btn-primary mt-3">Visszavétel</button>

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