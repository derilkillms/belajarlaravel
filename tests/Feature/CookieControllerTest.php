<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CookieControllerTest extends TestCase
{
   public function testCreateCookie() {
    $this->get('/cookie/set')
    ->assertSeeText('Hello Cookie')
    ->assertCookie('User-Id', 'deril')
    ->assertCookie('Is-Member', 'true');

   }
   public function testGetCookie() {
    $this->withCookie('User-Id', 'deril')
    ->withCookie('Is-Member', 'true')
    ->get('/cookie/get')
    ->assertJson([
        'UserId' => 'deril',
        'isMember' => 'true'
    ]);

   }


}
