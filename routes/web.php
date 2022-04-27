<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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
    return  view('welcome');
});

Route::name("products.")->middleware("auth")->prefix("/products")->group(function () {

    Route::get("/", [ProductsController::class ,"index"])->name("index");

    Route::get("/create", [ProductsController::class ,"create"])->name("create");
    Route::post("/create", [ProductsController::class ,"store"])->name("store");

    Route::get("/edit/{id}", [ProductsController::class ,"edit"])->name("edit");
    Route::post("/edit/{id}", [ProductsController::class ,"update"])->name("update");

    Route::delete("/delete/{id}", [ProductsController::class, "delete"])->name("delete");



    Route::delete("/edit/delete/{id}", [ImagesController::class, "delete"])->name("delete");


    Route::post("/search", [HomeController::class ,"searchWords"])->name("searchWords");


});



























Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("auth");



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
