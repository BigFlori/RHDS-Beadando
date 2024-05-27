{{-- <!-- resources/views/books/index.blade.php -->
@extends('layouts.app')



@section('content')
    <div class="container">
        <h1>Könyvek</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Új könyv felvétele</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Szerző</th>
                    <th>Cím</th>
                    <th>Kiadó</th>
                    <th>Kiadás éve</th>
                    <th>Kiadás</th>
                    <th>ISBN</th>
                    <th>Elérhető</th>
                    <th>Módosítva</th>
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
                            @if ($book->inventories->contains('borrowable', true))
                                <span class="badge bg-success">Elérhető</span>
                            @else
                                <span class="badge bg-danger">Nem elérhető</span>
                            @endif
                        </td>
                        <td>{{ $book->updated_at->format('Y. m. d. H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $books->links() }}
        </div>
    </div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Új könyv felvétele</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    @foreach (['id', 'author', 'title', 'publisher', 'publication_year', 'edition', 'isbn'] as $column)
                        <th>
                            <a
                                href="{{ route('books.index', ['sort' => $column, 'direction' => $sortDirection === 'asc' ? 'desc' : 'asc']) }}">
                                {{ ucfirst($column) }}
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
                                <span class="badge bg-success">Elérhető</span>
                            @else
                                <span class="badge bg-danger">Nem elérhető</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    {{ $book->isLoaned() ? 'disabled' : '' }}>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $books->links() }}
        </div>
    </div>
@endsection
