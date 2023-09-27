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
        ->assertStatus(200)
        ->assertSeeText('hello response');
        
    }

    public function testHeader() {
        $this->get('/response/header')
        ->assertStatus(200)
        ->assertSeeText('Muhammad')->assertSeeText('Deril')
        ->assertHeader('Content-Type','application/json')
        ->assertHeader('Author','Muhammad Deril')
        ->assertHeader('App','Belajar Laravel');
        
    }


    public function testView() {
        $this->get('/response/view')
        ->assertSeeText("Hello Deril");
    }

    public function testJson() {
        $this->get('/response/json')
        ->assertJson([
            'firstName' => 'Muhammad',
            'lastName' => 'Deril'
        ]);
        
    }

    public function testFile() {
        $this->get('/response/file')
        ->assertHeader('Content-Type', 'image/jpeg');
    }

    public function testDownload() {
        $this->get('/response/download')
        ->assertDownload('after.jpg');
    }
}
