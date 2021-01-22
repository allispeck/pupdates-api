<?php

namespace Tests\Unit\Pet;

use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DeletePetTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_soft_deletes_a_user_pet()
    {
        $pet = $this->utility->user->pets->first();
        Sanctum::actingAs($this->utility->user);
        $this->deleteJson(route('api.pet.destroy', $pet->id))
            ->assertOk();

        $this->assertSoftDeleted('pets', $pet->toArray());
    }
}
