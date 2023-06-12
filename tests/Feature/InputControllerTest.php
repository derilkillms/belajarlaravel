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
}
