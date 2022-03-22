<?php


namespace Tests;


use App\Models\User;

class Utility
{
    private $testInstance;
    public $user;
    public $secondUser;

    public function __construct($testInstance)
    {
        $this->testInstance = $testInstance;
    }

    public function testSetup()
    {
        $this->user = User::factory()->create();
        $this->secondUser = User::factory()->create();
        $this->user->tokens()->delete();
    }
}
