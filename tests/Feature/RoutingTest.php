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

    public function testRouteParameter()
    {
       $this->get('/products/1')
       ->assertSeeText('Products : 1');

       $this->get('/products/2')
       ->assertSeeText('Products : 2');

       $this->get('/products/1/item/xxx')
       ->assertSeeText('Products : 1 , Item : xxx');
    }

    public function testRouteParameterRegex()
    {
        $this->get('/categories/1')
       ->assertSeeText('Categoryid : 1');
       
       $this->get('/categories/xxx')
       ->assertSeeText('404 by derillab.com');
    }
    
    public function testParameterOptional()
    {
        $this->get('/users/deril')
        ->assertSeeText('Userid : deril');

        $this->get('/users')
        ->assertSeeText('Userid : 404');
    }

    public function testRouteConflict()
    {
        $this->get('/conflict/muhammad')
        ->assertSeeText('Name : muhammad');

        $this->get('/conflict/deril')
        ->assertSeeText('Name : muhammad deril');
    }

    public function testNamedRoute()
    {
        $this->get('/produk/1')
        ->assertSeeText('Link : http://localhost/products/1');

        $this->get('/product-redirect/1')
        ->assertRedirect('/products/1');
    }
}
