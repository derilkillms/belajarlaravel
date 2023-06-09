<?php

namespace App\Http\Controllers;

namespace App\Services\HelloServices;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    // protected $namespace = 'App\Http\Controllers';
    private HelloService $helloService;

    public function __construct(HelloService $helloService)
    {
        $this->helloService = $helloService;
    }
    public function hello(Request $request, string $name): string
    {
        // $request->path();
        return $this->helloService->hello($name);
    }
    
    public function request(Request $request)
    {
        return $request->path().PHP_EOL.
        $request->url().PHP_EOL.
        $request->fullUrl().PHP_EOL.
        $request->method().PHP_EOL.
        $request->header('Accept').PHP_EOL;
    }
}
