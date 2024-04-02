<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the factory generates data with the correct structure.
     */
    public function test_generates_valid_book_data()
    {
        $book = Book::factory()->make();

        $this->assertArrayHasKey('ISBN', $book->toArray());
        $this->assertArrayHasKey('title', $book->toArray());
        $this->assertArrayHasKey('author', $book->toArray());
        $this->assertArrayHasKey('publisher', $book->toArray());
        $this->assertArrayHasKey('publication_year', $book->toArray());
        $this->assertArrayHasKey('edition', $book->toArray());

        // Assert data types 
        $this->assertIsString($book->ISBN);
        $this->assertIsString($book->title);
        $this->assertIsString($book->author);
        $this->assertIsString($book->publisher);
        $this->assertIsString($book->publication_year); // Assumes year is a string
        $this->assertIsString($book->edition);
    }

    /**
     * Test if a book created by the factory can be saved to the database.
     */
    public function test_creates_book_in_database()
    {
        $book = Book::factory()->create();

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'ISBN' => $book->ISBN,
            'title' => $book->title,
            'author' => $book->author,
            'publisher' => $book->publisher,
            'publication_year' => $book->publication_year,
            'edition' => $book->edition,
        ]);
    }
}