@extends('layouts.app')

@section('title')
Új könyv
@endsection

{{-- isbn, title, author, publisher, publication_year, edition --}}
@section('content')
<div class="container-lg mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Új könyv hozzáadása</h1>
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>

                    <label for="title">Cím</label>
                    <input type="text" class="form-control" id="title" name="title" required>

                    <label for="author">Szerző</label>
                    <input type="text" class="form-control" id="author" name="author" required>

                    <label for="publisher">Kiadó</label>
                    <input type="text" class="form-control" id="publisher" name="publisher" required>

                    <label for="publication_year">Kiadás éve</label>
                    <input type="number" class="form-control" id="publication_year" name="publication_year" required>

                    <label for="edition">Kiadás</label>
                    <input type="number" class="form-control" id="edition" name="edition" required>

                    <button type="submit" class="btn btn-primary mt-3">Hozzáadás</button>

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