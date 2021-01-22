<?php

namespace Tests\Unit\User;

use App\Models\Pet;
use Tests\TestCase;

class ModelRelationshipTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function pets_relationship_brings_back_pets_that_are_associated_to_user()
    {
        $pets = Pet::where('user_id', $this->utility->user->id)->get();
        $this->assertEquals($pets->count(), $this->utility->user->pets->count(), "Relationship did not bring back the correct amount of pets");
        $this->utility->user->pets->foreach(function($pet) use ($pets) {
            $this->assertTrue($pets->containsStrict('id', $pet->id), "Relationship did not bring back a pet {$pet} in {$this->utility->user->pets}");
        });
    }
}
