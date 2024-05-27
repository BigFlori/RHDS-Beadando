<!-- resources/views/books/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher" required>
        </div>
        <div class="form-group">
            <label for="publication_year">Year</label>
            <input type="number" class="form-control" id="publication_year" name="publication_year" required>
        </div>
        <div class="form-group">
            <label for="edition">Edition</label>
            <input type="text" class="form-control" id="edition" name="edition" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="form-group">
            <label for="borrowable">Is Borrowable</label>
            <input type="checkbox" id="borrowable" name="borrowable">
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
@endsection