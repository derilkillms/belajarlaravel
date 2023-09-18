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

// route redirect

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

// route optional

Route::get('/products/{id}', function ($productid)
{
   return "Products : $productid";
})->name('product.detail');

Route::get('/products/{product}/item/{item}', function ($productid, $itemid)
{
    return "Products : $productid , Item : $itemid";
})->name('product.item.detail');

// regex route

Route::get('/categories/{id}', function ($categoryid)
{
   return "Categoryid : $categoryid";
})->where('id','[0-9]+')->name('caregory.detail');

Route::get('/users/{id?}', function ($userid = '404')
{
   return "Userid : $userid";
})->name('name.detail');

// conflict route

Route::get('/conflict/deril', function ()
{
   return "Name : muhammad deril";
});

Route::get('/conflict/{name}', function ($name)
{
   return "Name : $name";
});


Route::get('/produk/{id}', function ($id)
{
    $link = route('product.detail', ['id'=>$id]);
   return "Link : $link";
});

Route::get('/product-redirect/{id}', function ($id)
{
   
   return redirect()->route('product.detail',['id'=>$id]);
});


Route::get('/controller/hello/request',[\App\Http\Controllers\HelloController::class,'request']);
Route::get('/controller/hello/nganu',[\App\Http\Controllers\HelloController::class,'nganu']);
Route::get('/controller/hello/{name}',[\App\Http\Controllers\HelloController::class,'hello']);


Route::get('/input/hello',[\App\Http\Controllers\InputController::class,'hello']);
Route::post('/input/hello',[\App\Http\Controllers\InputController::class,'hello']);
Route::post('/input/hello/first',[\App\Http\Controllers\InputController::class,'helloFirstName']);
Route::post('/input/hello/input',[\App\Http\Controllers\InputController::class,'helloInput']);




