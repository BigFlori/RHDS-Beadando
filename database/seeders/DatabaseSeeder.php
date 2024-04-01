<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Inventory;
use App\Models\Librarian;
use App\Models\Loan;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        MemberType::factory()->create([
            'name' => 'Egyetemi hallgató',
            'borrow_limit' => 5,
            'borrow_day_limit' => 60,
        ]);

        MemberType::factory()->create([
            'name' => 'Egyetemi oktató',
            'borrow_limit' => -1,
            'borrow_day_limit' => 365,
        ]);

        MemberType::factory()->create([
            'name' => 'Külsős olvasó',
            'borrow_limit' => 4,
            'borrow_day_limit' => 30,
        ]);

        MemberType::factory()->create([
            'name' => 'Egyéb',
            'borrow_limit' => 2,
            'borrow_day_limit' => 14,
        ]);
        
        Librarian::factory(3)->create();
        Book::factory(50)->create();
        Inventory::factory(50)->create();
        Member::factory(50)->create();
        Loan::factory(50)->create();

    }
}
