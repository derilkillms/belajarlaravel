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

Route::post('/input/hello/array',[\App\Http\Controllers\InputController::class,'arrayInput']);

Route::post('/input/type',[\App\Http\Controllers\InputController::class,'inputType']);


Route::post('/input/only',[\App\Http\Controllers\InputController::class,'filterOnly']);
Route::post('/input/except',[\App\Http\Controllers\InputController::class,'filterExcept']);
Route::post('/input/merge',[\App\Http\Controllers\InputController::class,'filterMerge']);


Route::post('/file/upload',[\App\Http\Controllers\FileController::class,'upload'])
->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

//route group
Route::prefix('/response')->group(function () {
    Route::get('/hello',[\App\Http\Controllers\ResponseController::class,'response']);
    Route::get('/header',[\App\Http\Controllers\ResponseController::class,'header']);
    Route::get('/view',[\App\Http\Controllers\ResponseController::class,'responseView']);
    Route::get('/json',[\App\Http\Controllers\ResponseController::class,'responseJson']);
    Route::get('/file',[\App\Http\Controllers\ResponseController::class,'responseFile']);
    Route::get('/download',[\App\Http\Controllers\ResponseController::class,'responseDownload']);
});

// controller group
Route::controller(\App\Http\Controllers\CookieController::class)->group(function () {
    Route::get('/cookie/set','createCookie');
    Route::get('/cookie/get','getCookie');
    Route::get('/cookie/clear','clearCookie');
});

Route::get('/redirect/from', [\App\Http\Controllers\RedirectController::class, 'redirectFrom']);
Route::get('/redirect/to', [\App\Http\Controllers\RedirectController::class, 'redirectTo']);
Route::get('/redirect/name', [\App\Http\Controllers\RedirectController::class, 'redirectName']);
Route::get('/redirect/name/{name}', [\App\Http\Controllers\RedirectController::class, 'redirectHello'])
->name('redirect-hello');

Route::get('/redirect/action', [\App\Http\Controllers\RedirectController::class, 'redirectAction']);
Route::get('/redirect/away', [\App\Http\Controllers\RedirectController::class, 'redirectAway']);

// middleware group
Route::middleware(['contoh:PZN,401'])->group(function () {
    Route::get('/middleware/api', function () {
        return "OK";

    });


    Route::get('/middleware/group', function () {
        return "GROUP";

    });
});



Route::get('/form', [\App\Http\Controllers\FormController::class, 'form']);
Route::post('/form', [\App\Http\Controllers\FormController::class, 'submitForm']);

