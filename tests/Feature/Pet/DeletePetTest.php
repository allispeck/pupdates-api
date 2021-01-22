<?php

namespace Tests\Feature\Pet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeletePetTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_does_allow_authed_user_to_delete_their_pets()
    {
        $pet = $this->utility->user->pets->first();
        Sanctum::actingAs($this->utility->user);
        $this->deleteJson(route('api.pet.destroy', $pet->id))
            ->assertOk();
    }

    /** @test */
    public function it_does_not_allow_authed_users_to_delete_other_authed_users_pets()
    {
        $pet = $this->utility->user->pets->first();
        Sanctum::actingAs($this->utility->secondUser);
        $this->deleteJson(route('api.pet.destroy', $pet->id))
            ->assertForbidden();
    }

    /** @test */
    public function it_does_not_allow_non_authed_users_to_delete_user_pets()
    {
        $pet = $this->utility->user->pets->first();
        $this->deleteJson(route('api.pet.destroy', $pet->id))
            ->assertUnauthorized();
    }
}
