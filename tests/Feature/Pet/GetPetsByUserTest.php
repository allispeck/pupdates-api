<?php

namespace Tests\Feature\Pet;

use App\Models\Pet;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class GetPetsByUserTest extends TestCase
{
    /** @test */
    public function it_allows_authed_user_to_get_other_authed_user_pets()
    {
        $pet = Pet::factory()->create([
            'user_id' => $this->utility->user->id
        ]);
        Sanctum::actingAs($this->utility->secondUser);
        $this->getJson(route('api.user.pets', $this->utility->user->id))
            ->assertOk()
            ->assertJsonFragment([
                'id' => $pet->id,
                'name' => $pet->name,
                'breed' => $pet->breed,
                'date_of_birth' => $pet->date_of_birth,
            ]);
    }

    /** @test */
    public function it_does_not_allow_non_authed_to_get_authed_user_pets()
    {
        $this->getJson(route('api.user.pets', $this->utility->user->id))
            ->assertUnauthorized();
    }
}
