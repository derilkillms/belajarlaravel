<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testInput()
    {
        $this->get('/input/hello?name=Deril')
        ->assertSeeText('Hello Deril');

        $this->post('/input/hello', [

            'name'=>'Deril'
        ])
        ->assertSeeText('Hello Deril');
    }

    public function testNestedInput()
    {
        $this->post('/input/hello/first', [
            "name" => [
                "first"=> "Deril",
                "last"=> "Muhammad"
            ]
        ])
        ->assertSeeText('Hello Deril');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/input', [
            "name" => [
                "first"=> "Deril",
                "last"=> "Muhammad"
            ]
        ])->assertSeeText("name")->assertSeeText("first")
        ->assertSeeText('last')->assertSeeText("Deril");
    }

    public function testInputArray()
    {
        $this->post('/input/hello/input', [
            "products" => [

                [
                    "name"=> "Xiaomi",
                    "price"=>15000
                ],
                [
                    "name"=> "Apple",
                    "price"=>20000
                ]
               
            
            ]
        ])->assertSeeText("Apple")
        ->assertSeeText("Xiaomi");
        // ->assertSeeText('name')->assertSeeText("Apple");
    }

    public function testInputType(){
        $this->post('/input/type', [
            'name' => 'Budi',
            'married' => 'true',
            'birth_date' => '1990-10-10'
            ])->assertSeeText('Budi')->assertSeeText("true")->assertSeeText("1990-10-10");
    }



}
