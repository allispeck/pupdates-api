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
        $this->user = User::first();
        $this->secondUser = User::whereNotIn('id', [$this->user->id])->first();
        $this->user->tokens()->delete();
    }
}
