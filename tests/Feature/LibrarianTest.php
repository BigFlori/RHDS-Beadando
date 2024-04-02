<?php

namespace Tests\Feature;

use App\Models\Librarian;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LibrarianFactoryTest extends TestCase
{
    use RefreshDatabase; 

    /**
     * Test if the factory generates data with the correct structure.
     */
    public function test_generates_valid_librarian_data()
    {
        $librarian = Librarian::factory()->make();

        $this->assertArrayHasKey('username', $librarian->toArray());
        $this->assertArrayHasKey('password', $librarian->toArray());

        $this->assertIsString($librarian->username);
        $this->assertIsString($librarian->password);
    }

    /**
     * Test if the generated password is hashed.
     */
    public function test_password_is_hashed()
    {
        $librarian = Librarian::factory()->make();

        $this->assertTrue(Hash::check('password', $librarian->password)); 
    }

    /**
     * Test if a librarian record created by the factory can be saved to the database.
     */
    public function test_creates_librarian_in_database()
    {
        $librarian = Librarian::factory()->create();

        $this->assertDatabaseHas('librarians', [
            'id' => $librarian->id,
            'username' => $librarian->username,
        ]);

        // We don't directly check the 'password' field, as it's hashed
    }
}