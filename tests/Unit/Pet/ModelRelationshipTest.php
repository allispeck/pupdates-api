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
        $user = User::factory()->create();

        $pet = Pet::factory()->create([
            'user_id' => $user->id
        ]);
        $this->assertEquals($user->id, $pet->user->id);
    }
}
