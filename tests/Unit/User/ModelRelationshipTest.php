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
        $petCount = 2;
        Pet::factory($petCount)->create([
            'user_id' => $this->utility->user->id
        ]);
        Pet::factory()->create();
        $this->assertCount($petCount, $this->utility->user->pets);

    }
}
