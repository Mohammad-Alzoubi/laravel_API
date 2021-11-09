<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/category',function(){
//     return category::all();
// });

// Route::post('/category',function(){
//     return Category::create([
//         'name'=>'mohammad',
//     ]);
// });

//======  Category ======
// Route::get('/category',[CategoryController::class,'index']);
// Route::post('/category',[CategoryController::class,'store']);
// Route::put('/category/{id}',[CategoryController::class, 'update']);
// // search by category_name
// Route::get('/category/search/{name}',[CategoryController::class,'search']);

//======  product ======
// Route::get('/product',[ProductController::class,'index']);
// Route::get('/product/{category_id}',[ProductController::class,'show']);
// Route::post('/product',[ProductController::class,'store']);
// Route::put('/product/{id}',[ProductController::class, 'update']);


// ======= jwt =========
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'auth',
    ],
    function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
        Route::post('logout', 'AuthController@logout');
    }
);

// ======= Category =========
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
    ],
    function ($router) {
        Route::get('/category',[CategoryController::class,'index']);
        Route::post('/category',[CategoryController::class,'store']);
        Route::put('/category/{id}',[CategoryController::class, 'update']);
        // search by category_name
        Route::get('/category/search/{name}',[CategoryController::class,'search']);
    }
);

// ======= Product ========= 
Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
    ],
    function ($router) {
        Route::get('/product',[ProductController::class,'index']);
        Route::get('/product/{category_id}',[ProductController::class,'show']);
        Route::post('/product',[ProductController::class,'store']);
        Route::put('/product/{id}',[ProductController::class, 'update']);
    }
);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});