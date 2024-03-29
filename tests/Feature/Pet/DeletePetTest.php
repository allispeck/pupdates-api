<?php

namespace Tests\Feature\Pet;

use App\Models\Pet;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeletePetTest extends TestCase
{
    /** @test */
    public function it_does_allow_authed_user_to_delete_their_pets()
    {
        $pet = Pet::factory()->create([
            'user_id' => $this->utility->user->id
        ]);
        Sanctum::actingAs($this->utility->user);
        $this->deleteJson(route('api.pets.destroy', $pet->id))
            ->assertNoContent();
    }

    /** @test */
    public function it_does_not_allow_users_to_delete_pets_belonging_to_other_users()
    {
        $pet = Pet::factory()->create([
            'user_id' => $this->utility->user->id
        ]);
        Sanctum::actingAs($this->utility->secondUser);
        $this->deleteJson(route('api.pets.destroy', $pet->id))
            ->assertForbidden();
    }

    /** @test */
    public function it_does_not_allow_non_authed_users_to_delete_user_pets()
    {
        $pet = Pet::factory()->create([
            'user_id' => $this->utility->user->id
        ]);
        $this->deleteJson(route('api.pets.destroy', $pet->id))
            ->assertUnauthorized();
    }
}
