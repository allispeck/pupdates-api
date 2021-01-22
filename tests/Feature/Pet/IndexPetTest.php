<?php

namespace Tests\Feature\Pet;

use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class IndexPetTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_allows_authed_users_to_get_their_pets()
    {
        $pet = Pet::factory()->create([
            'user_id' => $this->utility->user->id
        ]);
        Sanctum::actingAs($this->utility->user);
        $this->getJson(route('api.pet.index'))
            ->assertOk()
            ->assertJsonFragment([
                'id' => $pet->id,
                'name' => $pet->name,
                'breed' => $pet->breed,
                'date_of_birth' => $pet->date_of_birth,
                'user_id' => $pet->user_id,
            ]);
    }

    /** @test */
    public function it_does_not_allow_non_authed_users_to_get_pets()
    {
        $this->getJson(route('api.pet.index'))
            ->assertUnauthorized();
    }
}
