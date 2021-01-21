<?php


namespace Tests;


use App\Models\User;

class Utility
{
    private $testInstance;
    public $user;

    public function __construct($testInstance)
    {
        $this->testInstance = $testInstance;
    }

    public function testSetup()
    {
        $this->user = User::get()->first();
    }
}
