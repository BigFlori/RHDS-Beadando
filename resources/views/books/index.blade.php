{{-- <!-- resources/views/books/index.blade.php --> --}}

@extends('layouts.app')

@section('title')
    Könyvek
@endsection

@section('content')
    <div class="container">
        <h1>Könyvek</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Új könyv felvétele</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    @foreach (['id', 'author', 'title', 'publisher', 'publication_year', 'edition', 'isbn'] as $column)
                        <th>
                            <a class="d-flex gap-1 text-decoration-none text-dark justify-content-center align-items-center"
                                href="{{ route('books.index', ['sort' => $column, 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                {{ ucfirst(str_replace('_', ' ', $column)) }}
                                @if ($sortColumn === $column)
                                    @if ($sortDirection === 'asc')
                                        <i class="fa-solid fa-arrow-down"></i>
                                    @else
                                        <i class="fa-solid fa-arrow-up"></i>
                                    @endif
                                @endif
                            </a>
                        </th>
                    @endforeach
                    <th>Elérhető</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>{{ $book->edition }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>
                            @if ($book->isLoaned())
                                <span class="badge bg-success">Kölcsönözhető</span>
                            @else
                                <span class="badge bg-danger">Nem elérhető</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('books.edit', $book->id) }}"
                                    class="btn btn-warning btn-sm">Szerkesztés</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        {{ $book->isLoaned() ? 'disabled' : '' }}>Törlés</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $books->appends(request()->except('page'))->links() }}
        </div>
    </div>
@endsection
