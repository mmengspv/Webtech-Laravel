<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
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

Route::get('apartments/{apartment}/rooms/create', [ApartmentController::class, 'createRoom'])->name('apartments.rooms.create');
Route::resource('apartments', ApartmentController::class);
Route::resource('rooms', RoomController::class);
Route::resource('tasks', TaskController::class);
Route::resource('tags', TagController::class);

Route::get('tag/{slug}', [TagController::class, 'showBySlug'])->name('tags.slug');
