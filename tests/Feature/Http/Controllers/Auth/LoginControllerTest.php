<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Http\Response;
use Tests\TestCase;
use Tests\Utility;

class LoginControllerTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->utility = new Utility($this);
        $this->utility->testSetup();
    }

    /** @test */
    public function it_returns_the_user_upon_successful_login()
    {
        $this->postJson(route('api.login'), [
            'email'    => $this->utility->user->email,
            'password' => 'password'
        ])->assertOk()
            ->assertJsonFragment([
                'id'    => $this->utility->user->id,
                'email' => $this->utility->user->email,
                'name' => $this->utility->user->name,
            ]);
    }

    /** @test */
    public function it_returns_error_message_when_login_failed()
    {
        $this->postJson(route('api.login'), [
            'email' => $this->utility->user->email,
            'password' => $this->faker->word
        ])->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonFragment([
                'errors' => [
                    'email' =>  'The provided credentials do not match our records.',
                ]
            ]);
    }
}
