<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tests\Utility;

class RegisterControllerTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->utility = new Utility($this);
        $this->utility->testSetup();
    }

    /** @test */
    public function it_can_register_a_new_user()
    {
        $email = $this->faker->email;
        $name = $this->faker->name . 'New Guy';
        $response = $this->postJson(route('api.register'), [
            'email' => $email,
            'name' => $name,
            'password' => 'password'
        ])->assertCreated();

        $response->assertJsonFragment([
            'email' => $email,
            'name' => $name,
        ]);

        $this->assertDatabaseHas('users', [
            'email' => $email,
            'name' => $name,
        ]);
    }

    /** @test */
    public function it_doesnt_allow_multiple_users_with_the_same_email()
    {
        $email = $this->faker->email;
        $name = $this->faker->name . 'New Guy';
        $this->postJson(route('api.register'), [
            'email' => $email,
            'name' => $name,
            'password' => 'password'
        ])->assertCreated();

        $this->postJson(route('api.register'), [
            'email' => $email,
            'name' => 'Some Other Person',
            'password' => 'password'
        ])->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);

        $this->assertCount(1, User::whereEmail($email)->get());
    }
}
