<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Inventory;
use App\Models\Loan;
use App\Models\Member;
use App\Models\MemberType;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoanFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the factory generates data with the correct structure.
     */
    public function test_generates_valid_loan_data()
    {
        $loan = Loan::factory()->make();

        $this->assertArrayHasKey('member_id', $loan->toArray());
        $this->assertArrayHasKey('inventory_id', $loan->toArray());
        $this->assertArrayHasKey('borrow_date', $loan->toArray());
        $this->assertArrayHasKey('return_date', $loan->toArray());

        $loan->borrow_date = Carbon::parse($loan->borrow_date);
        $loan->return_date = Carbon::parse($loan->return_date);

        $this->assertIsInt($loan->member_id);
        $this->assertIsInt($loan->inventory_id);
        $this->assertInstanceOf(\DateTimeInterface::class, $loan->borrow_date);
        $this->assertInstanceOf(\DateTimeInterface::class, $loan->return_date);
    }

    /**
     * Test if a loan record created by the factory can be saved to the database.
     */
    public function test_creates_loan_in_database()
    {
        $book = Book::factory()->create();
        $inventory = Inventory::factory()->create([
            'book_id' => $book->id,
        ]);

        $memberType = MemberType::factory()->create();
        $member = Member::factory()->create([
            'type_id' => $memberType->id,
        ]);

        $loan = Loan::factory()->create([
            'member_id' => $member->id,
            'inventory_id' => $inventory->id,
        ]);

        $this->assertDatabaseHas('loans', [
            'id' => $loan->id,
            'member_id' => $loan->member_id,
            'inventory_id' => $loan->inventory_id,
            'borrow_date' => $loan->borrow_date,
            'return_date' => $loan->return_date,
        ]);
    }

    /**
     * Test relationships with Member and Inventory.
     */
    public function test_loan_relationships()
    {
        $memberType = MemberType::factory()->create();
        $member = Member::factory()->create([
            'type_id' => $memberType->id,
        ]);

        $book = Book::factory()->create();
        $inventory = Inventory::factory()->create([
            'book_id' => $book->id,
        ]);

        $loan = Loan::factory()->create([
            'member_id' => $member->id,
            'inventory_id' => $inventory->id,
        ]);

        $this->assertEquals($member->id, $loan->member_id);
        $this->assertEquals($inventory->id, $loan->inventory_id);
    }

    /**
     * Test date logic (borrow_date and return_date).
     */
    public function test_date_ranges()
    {
        $memberType = MemberType::factory()->create();
        $member = Member::factory()->create([
            'type_id' => $memberType->id,
        ]);

        $book = Book::factory()->create();
        $inventory = Inventory::factory()->create([
            'book_id' => $book->id,
        ]);

        $loan = Loan::factory()->create([
            'member_id' => $member->id,
            'inventory_id' => $inventory->id,
        ]);

        $loan->borrow_date = Carbon::parse($loan->borrow_date);
        $loan->return_date = Carbon::parse($loan->return_date);

        $this->assertTrue($loan->borrow_date->isPast());
        $this->assertTrue($loan->borrow_date->lt(now())); // Less than now
        $this->assertTrue($loan->return_date->isFuture());
        $this->assertTrue($loan->return_date->gt(now())); // Greater than now
    }
}
