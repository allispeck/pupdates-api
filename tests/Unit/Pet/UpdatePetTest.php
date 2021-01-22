<?php

namespace Tests\Unit\Pet;

use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UpdatePetTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_updates_user_pet_in_db()
    {
        $pet = $this->utility->user->pets->first();
        $pet->name = $pet->name . ' new';

        Sanctum::actingAs($this->utility->user);
        $this->putJson(route('api.pet.update', $pet->id), $pet->toArray())
            ->assertOk();

        $this->assertDatabaseHas('pets', [
            'id' => $pet->id,
            'name' => $pet->name,
            'date_of_birth' => $pet->date_of_birth,
            'breed' => $pet->breed
        ]);
    }
}
