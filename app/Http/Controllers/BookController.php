<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Inventory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $sortableColumns = ['id', 'author', 'title', 'publisher', 'publication_year', 'edition', 'isbn'];
        $sortColumn = $request->get('sort', 'updated_at');
        $sortDirection = $request->get('direction', 'desc');

        if (!in_array($sortColumn, $sortableColumns)) {
            $sortColumn = 'updated_at';
        }

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'desc';
        }

        $books = Book::with('inventories')->orderBy($sortColumn, $sortDirection)->paginate(10);
        return view('books.index', compact('books', 'sortColumn', 'sortDirection'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->author = $request->input('author');
        $book->title = $request->input('title');
        $book->publisher = $request->input('publisher');
        $book->publication_year = $request->input('publication_year');
        $book->edition = $request->input('edition');
        $book->isbn = $request->input('isbn');
        $book->save();

        $inventory = new Inventory();
        $inventory->book_id = $book->id;
        $inventory->borrowable = $request->has('borrowable');
        $inventory->save();

        return redirect()->route('books.index');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->author = $request->input('author');
        $book->title = $request->input('title');
        $book->publisher = $request->input('publisher');
        $book->publication_year = $request->input('publication_year');
        $book->edition = $request->input('edition');
        $book->isbn = $request->input('isbn');
        $book->save();

        $inventory = $book->inventories->first();
        if ($inventory) {
            $inventory->borrowable = $request->has('borrowable');
            $inventory->save();
        } else {
            $inventory = new Inventory();
            $inventory->book_id = $book->id;
            $inventory->borrowable = $request->has('borrowable');
            $inventory->save();
        }

        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if (!$book->isLoaned()) {
            return redirect()->route('books.index')->with('error', 'A könyv nem törölhető, mert ki van kölcsönözve.');
        }

        // Töröljük a kapcsolódó loan rekordokat
        foreach ($book->inventories as $inventory) {
            $inventory->loans()->delete();
        }

        // Töröljük a kapcsolódó inventory rekordokat
        $book->inventories()->delete();

        // Majd töröljük a könyvet
        $book->delete();

        return redirect()->route('books.index')->with('success', 'A könyv törölve lett.');
    }

    public function search(Request $request)
    {
        $query = Book::query();
        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->input('author') . '%');
        }
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }
        if ($request->has('isbn')) {
            $query->where('isbn', 'like', '%' . $request->input('isbn') . '%');
        }
        $books = $query->get();
        return view('books.index', compact('books'));
    }
}
