<?php

namespace App\Http\Controllers;

namespace App\Services\HelloServices;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    private HelloService $helloService;

    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }
    public function hello(Request $request, string $name): string
    {
        return $this->helloService->hello($name);
    }
}
