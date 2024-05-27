<!-- resources/views/books/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}"
                    required>
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $book->publisher }}"
                    required>
            </div>
            <div class="form-group">
                <label for="publication_year">Year</label>
                <input type="number" class="form-control" id="publication_year" name="publication_year" value="{{ $book->publication_year }}"
                    required>
            </div>
            <div class="form-group">
                <label for="edition">Edition</label>
                <input type="text" class="form-control" id="edition" name="edition" value="{{ $book->edition }}"
                    required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}"
                    required>
            </div>
            <div class="form-group">
                <label for="borrowable">Is Borrowable</label>
                <input type="checkbox" id="borrowable" name="borrowable"
                    {{ $book->inventories->contains('borrowable', true) ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
@endsection
