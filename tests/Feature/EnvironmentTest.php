<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Env;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    // vendor/bin/phpunit tests/Feature/EnvironmentTest.php

    public function testGetEnv()
    {
         //export YOUTUBE="Diconic Academy"
        $youtube = env('YOUTUBE');
        self::assertEquals('Diconic Academy', $youtube);
    }
    public function testDefaultEnv()
    {
        // $author = env('AUTHOR','Deril');
        $author = Env::get('AUTHOR','Deril');
        self::assertEquals('Deril',$author);
    }

}

