<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_register_a_new_user()
    {
        $email = 'testing@pupdates.com';
        $name = 'Jane Doe';
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
        $email = 'testing@pupdates.com';
        $name = 'Jane Doe';
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
