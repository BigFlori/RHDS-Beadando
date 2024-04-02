<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the factory generates data with the correct structure.
     */
    public function test_generates_valid_user_data()
    {
        $user = User::factory()->make();

        $this->assertArrayHasKey('name', $user->toArray());
        $this->assertArrayHasKey('email', $user->toArray());
        $this->assertArrayHasKey('email_verified_at', $user->toArray());

        $this->assertIsString($user->name);
        $this->assertIsString($user->email);
        $this->assertInstanceOf(\DateTimeInterface::class, $user->email_verified_at); 
    }

    /**
     * Test if a user created by the factory can be saved to the database.
     */
    public function test_creates_user_in_database()
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ]);

        // We don't directly check 'password' or 'remember_token' (hashed)
    }

     /**
     * Test if the password is hashed.
     */
    public function test_password_is_hashed()
    {
        $user = User::factory()->make();

        $this->assertTrue(Hash::check('password', $user->password));
    }

    /**
     * Test email verification status (unverified). 
     */
    public function test_creates_unverified_user() 
    {
        $user = User::factory()->unverified()->create();

        $this->assertNull($user->email_verified_at);
    }
}