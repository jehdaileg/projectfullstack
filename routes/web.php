<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
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

Route::get("/test2", [TestController::class, 'getMessageClient']);

//Handling spa route for any route

Route::any('{slug}', function(){

    return view('welcome');
});

//Test api routes

Route::post('/app/create_tag', [TestController::class, 'getApiResponseDatas']);

Route::get('/app/get_tags', [AdminController::class, 'get_tags']);

Route::post('/app/create_tag', [AdminController::class, 'create_tag']);

Route::post('/app/edit_tag', [AdminController::class, 'edit_tag']);

Route::post('/app/delete_tag', [AdminController::class, 'delete_tag']);
