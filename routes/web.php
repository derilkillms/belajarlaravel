<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/deril',function(){
    return "Hallo derillab.com";
});

Route::redirect('/youtube','deril');

Route::fallback(function ()
{
    return "404 by derillab.com";
});

Route::view('/hello','hello',['name'=>'Deril']);

Route::get('/hello-again',function(){
    return view('hello',['name'=>'Tetsuya']);
});

Route::get('/hello-world',function(){
    return view('hello.world',['name'=>'Tetsuya']);
});