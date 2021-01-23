<?php

namespace Tests\Unit\Pet;

use App\Models\Pet;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CreatePetTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_creates_pet_for_user()
    {
        $pet = Pet::factory()->make();
        Sanctum::actingAs($this->utility->user);
        $this->postJson(route('api.pets.store'), $pet->toArray())
            ->assertOk();

        $this->assertDatabaseHas('pets', [
            'name' => $pet->name,
            'date_of_birth' => $pet->date_of_birth,
            'breed' => $pet->breed,
            'user_id' => $this->utility->user->id,
        ]);
    }

}
