<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Config;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    
    public function testConfig()
    {
        //ambil dari file /config/contoh.php
        $firstname = config('contoh.author.first');
        $lastname = config('contoh.author.last');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('Muhammad',$firstname);
        self::assertEquals('Deril',$lastname);
        self::assertEquals('derilkillms@gmail.com',$email);
        self::assertEquals('https://www.derillab.com',$web);
    }
}
