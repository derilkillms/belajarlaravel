<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades;
use App;

use Tests\TestCase;

class AppEnvironmentTest extends TestCase
{
    
    public function testAppEnv()
    {
        // print_r(App::environment());

        if (App::environment('testing')) {
            // kode program kita
            self::assertTrue(true);
        }
    }
}
