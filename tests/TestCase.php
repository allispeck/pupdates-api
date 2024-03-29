<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;
    use WithFaker;

    protected $utility;

    protected function setUp(): void
    {
        parent::setUp();
        $this->utility = new Utility($this);
        $this->utility->testSetup();
    }
}
