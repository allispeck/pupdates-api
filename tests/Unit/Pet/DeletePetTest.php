<?php

namespace Tests\Unit\Pet;

use App\Models\Pet;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeletePetTest extends TestCase
{
    /** @test */
    public function it_soft_deletes_a_user_pet()
    {
        $pet = Pet::factory()->create([
            'user_id' => $this->utility->user->id
        ]);
        Sanctum::actingAs($this->utility->user);
        $this->deleteJson(route('api.pets.destroy', $pet->id))
            ->assertNoContent();

        $this->assertSoftDeleted('pets', $pet->toArray());
    }
}
