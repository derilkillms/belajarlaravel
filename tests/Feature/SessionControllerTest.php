<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
   public function testCreateSession() {
        $this->get('/session/create')
        ->assertSeeText("OK")
        ->assertSessionHas("userId","deril")
        ->assertSessionHas("isMember", true);
   }

   public function testGetSession() {
    $this->withSession([
        "userId" => "deril",
        "isMember" => true
    ])->get('/session/get')
    ->assertSeeText("User ID : deril, is Member : 1")
    ->assertSessionHas("userId","deril")
    ->assertSessionHas("isMember", true);
}


}
