<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    public function testRedirect() {
        $this->get('/redirect/from')
        ->assertRedirect('/redirect/to');
    }

    public function testRedirectName() {
        $this->get('/redirect/name')
        ->assertRedirect('/redirect/name/Eko');
    }

    public function testRedirectAway() {
        $this->get('/redirect/away')
        ->assertRedirect('https://www.derillab.com');
    }

}
