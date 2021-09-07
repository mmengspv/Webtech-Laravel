<?php

use App\Http\Controllers\ApartmentController;
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

Route::get('/hello', [App\Http\Controllers\HelloController::class, "index"]);

Route::get("/hello/array", [App\Http\Controllers\HelloController::class, "array"])->name('hello.array');

Route::get("/post/{id?}", [App\Http\Controllers\HelloController::class, "post"]);

Route::get("/about", [App\Http\Controllers\HelloController::class, "about"]);

Route::resource('apartments', ApartmentController::class);
