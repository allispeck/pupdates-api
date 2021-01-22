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
        $pet = $this->postJson(route('api.pet.store'), $pet->toArray())
            ->assertOk()
            ->getOriginalContent();

        $this->assertDatabaseHas('pets', $pet->toArray());
    }

}
