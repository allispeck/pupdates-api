<?php

namespace Tests\Unit\Pet;

use App\Models\Pet;
use App\Models\User;
use Tests\TestCase;

class ModelRelationshipTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_brings_back_proper_user_that_is_related_to_pet()
    {
        $pet = Pet::all()->random();
        $user = User::findOrFail($pet->user_id);
        $this->assertEquals($user, $pet->user, "Pet's User relationship did not bring back correct user.");
    }
}
