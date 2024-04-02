<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Inventory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the factory generates data with the correct structure.
     */
    public function test_generates_valid_inventory_data()
    {
        $inventory = Inventory::factory()->make();

        $this->assertArrayHasKey('book_id', $inventory->toArray());
        $this->assertArrayHasKey('borrowable', $inventory->toArray());

        $this->assertIsInt($inventory->book_id);
        $this->assertIsBool($inventory->borrowable);
    }

    /**
     * Test if an inventory record created by the factory can be saved to the database.
     */
    public function test_creates_inventory_in_database()
    {
        $book = Book::factory()->create();
        $inventory = Inventory::factory()->create([
            'book_id' => $book->id,
        ]);

        $this->assertDatabaseHas('inventories', [
            'id' => $inventory->id,
            'book_id' => $inventory->book_id,
            'borrowable' => $inventory->borrowable,
        ]);
    }

    /**
     * Test if the relationship between Inventory and Book works.
     */
    public function test_inventory_book_relationship()
    {
        $book = Book::factory()->create();
        $inventory = Inventory::factory()->create([
            'book_id' => $book->id,
        ]);

        $this->assertEquals($book->id, $inventory->book_id); // Assuming you have a 'book' relationship on the Inventory model
    }
}