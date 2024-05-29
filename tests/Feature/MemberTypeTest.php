<?php

namespace Tests\Feature;

use App\Models\MemberType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberTypeFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the factory generates data with the correct structure.
     */
    public function test_generates_valid_member_type_data()
    {
        $memberType = MemberType::factory()->make();

        $this->assertArrayHasKey('type_name', $memberType->toArray());
        $this->assertArrayHasKey('borrow_limit', $memberType->toArray());
        $this->assertArrayHasKey('borrow_day_limit', $memberType->toArray());

        $this->assertIsString($memberType->name);
        $this->assertIsInt($memberType->borrow_limit);
        $this->assertIsInt($memberType->borrow_day_limit);
    }

    /**
     * Test if a member type created by the factory can be saved to the database.
     */
    public function test_creates_member_type_in_database()
    {
        $memberType = MemberType::factory()->create();

        $this->assertDatabaseHas('member_types', [
            'id' => $memberType->id,
            'type_name' => $memberType->name,
            'borrow_limit' => $memberType->borrow_limit,
            'borrow_day_limit' => $memberType->borrow_day_limit,
        ]);
    }
}