<?php

namespace Tests\Feature\Pet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class GetPetsByUserTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_allows_authed_user_to_get_other_authed_user_pets()
    {
        Sanctum::actingAs($this->utility->secondUser);
        $this->getJson(route('api.user.pets', $this->utility->user->id))
            ->assertOk()
            ->assertJsonFragment([
                'id',
                'name',
                'breed',
                'date_of_birth'
            ]);
    }

    /** @test */
    public function it_does_not_allow_non_authed_to_get_authed_user_pets()
    {
        $this->getJson(route('api.user.pets', $this->utility->user->id))
            ->assertUnauthorized();
    }
}
