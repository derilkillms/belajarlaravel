<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testGet()
    {
       $this->get('/deril')
       ->assertStatus(200)
       ->assertSeeText('Hallo derillab.com');
    }
    public function testRedirect()
    {
        $this->get('/youtube')
        ->assertRedirect('/deril');
    }
    public function testFallback()
    {
        $this->get('/kosong')
        ->assertSeeText('404 by derillab.com');
       
    }
    
    public function testTemplate()
    {
        $this->view('hello',['name'=>'Deril'])
        ->assertSeeText('Hello Deril');
    }
}
