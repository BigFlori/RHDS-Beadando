<?php

namespace Tests\Feature;

use App\Models\Member;
use App\Models\MemberType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberFactoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if the factory generates data with the correct structure.
     */
    public function test_generates_valid_member_data()
    {
        $member = Member::factory()->make();

        $this->assertArrayHasKey('member_type_id', $member->toArray());
        $this->assertArrayHasKey('name', $member->toArray());
        $this->assertArrayHasKey('email', $member->toArray());
        $this->assertArrayHasKey('phone_number', $member->toArray());
        $this->assertArrayHasKey('zip_code', $member->toArray());
        $this->assertArrayHasKey('city', $member->toArray());
        $this->assertArrayHasKey('address', $member->toArray());

        $this->assertIsInt($member->member_type_id);
        $this->assertIsString($member->name);
        $this->assertIsString($member->email);
        $this->assertIsString($member->phone_number);
        $this->assertIsString($member->zip_code);
        $this->assertIsString($member->city);
        $this->assertIsString($member->address);
    }

    /**
     * Test if a member created by the factory can be saved to the database.
     */
    public function test_creates_member_in_database()
    {
        $memberType = MemberType::factory()->create();
        $member = Member::factory()->create([
            'member_type_id' => $memberType->id,
        ]);

        $this->assertDatabaseHas('members', [
            'id' => $member->id,
            'member_type_id' => $member->member_type_id,
            'name' => $member->name,
            'email' => $member->email,
            'phone_number' => $member->phone_number,
            'zip_code' => $member->zip_code,
            'city' => $member->city,
            'address' => $member->address,
        ]);
    }

    /**
     * Test if the email field is generated as unique.
     */
    public function test_generates_unique_emails() 
    {
        $memberType1 = MemberType::factory()->create();
        $member1 = Member::factory()->create([
            'member_type_id' => $memberType1->id,
        ]);

        $memberType2 = MemberType::factory()->create();
        $member2 = Member::factory()->create([
            'member_type_id' => $memberType2->id,
        ]);

        $this->assertNotEquals($member1->email, $member2->email);
    }
}
