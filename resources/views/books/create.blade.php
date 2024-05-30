<!-- resources/views/books/create.blade.php -->
@extends('layouts.app')

@section('title')
    Könyv felvétel
@endsection

@section('content')
    <div class="container">
        <h1>Új könyv hozzáadása</h1>
        <form action="{{ route('books.store') }}" method="POST" class="d-flex flex-column gap-2">
            @csrf
            <div class="form-group">
                <label for="author">Szerző</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="title">Cím</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="publisher">Kiadó</label>
                <input type="text" class="form-control" id="publisher" name="publisher" required>
            </div>
            <div class="form-group">
                <label for="publication_year">Kiadás éve</label>
                <input type="number" class="form-control" id="publication_year" name="publication_year" required>
            </div>
            <div class="form-group">
                <label for="edition">Kiadás</label>
                <input type="text" class="form-control" id="edition" name="edition" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" required>
            </div>
            {{-- <div class="form-group">
            <label for="borrowable">Is Borrowable</label>
            <input type="checkbox" id="borrowable" name="borrowable">
        </div> --}}
            <div>
                <button type="submit" class="btn btn-primary">Könyv hozzáadása</button>
            </div>
        </form>
    </div>
@endsection
