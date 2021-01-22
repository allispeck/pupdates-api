<?php

namespace Tests\Feature\Pet;

use App\Models\Pet;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UpdatePetTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_does_allow_authed_users_to_update_their_pets()
    {
        $pet = Pet::factory()->create([
            'user_id' => $this->utility->user->id
        ]);
        $pet->name = $pet->name . ' new';

        Sanctum::actingAs($this->utility->user);
        $this->putJson(route('api.pet.update', $pet->id), $pet->toArray())
            ->assertOk();
    }

    /** @test */
    public function it_does_not_allow_other_authed_users_to_update_other_authed_users_pets()
    {
        $pet = Pet::factory()->create([
            'user_id' => $this->utility->user->id
        ]);
        $pet->name = $pet->name . ' new';
        Sanctum::actingAs($this->utility->secondUser);
        $this->putJson(route('api.pet.update', $pet->id), $pet->toArray())
            ->assertForbidden();
    }

    /** @test */
    public function it_does_not_allow_non_authed_users_to_update_authed_user_pets()
    {

        $pet = Pet::factory()->create([
            'user_id' => $this->utility->user->id
        ]);
        $pet->name = $pet->name . ' new';
        $this->putJson(route('api.pet.update', $pet->id), $pet->toArray())
            ->assertUnauthorized();
    }
}
