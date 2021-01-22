<?php

namespace Tests\Feature\Pet;

use App\Models\Pet;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use Tests\Utility;

class CreatePetTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_returns_newly_created_pet()
    {
        $pet = Pet::factory()->make();
        Sanctum::actingAs($this->utility->user);
        $this->postJson(route('api.pet.store'), $pet->toArray())
            ->assertOk()
            ->assertJsonFragment([
                'name' => $pet->name,
                'date_of_birth' => $pet->date_of_birth,
                'breed' => $pet->breed,
                'user_id' => $this->utility->user->id,
            ]);
    }

    /** @test */
    public function it_does_not_allow_un_authed_to_create_pets()
    {
        $pet = Pet::factory()->make();
        $this->postJson(route('api.pet.store'), $pet->toArray())
            ->assertUnauthorized();
    }

}
