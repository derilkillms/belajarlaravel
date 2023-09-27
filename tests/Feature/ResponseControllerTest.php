<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse() {
        $this->get('/response/hello')
        ->assetStatus(200)
        ->assertSeeText('hello response');
        
    }
}
