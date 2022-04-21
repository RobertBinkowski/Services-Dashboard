<?php

use App\Http\Controllers\errorManager;
use App\Http\Controllers\Services;
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

//Routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', function () {return view('search');});

Route::get('/service/{id}', [App\Http\Controllers\ServicesController::class, 'show']);

Route::get('/myservices', [App\Http\Controllers\ServicesController::class, 'myservices']);// No Blade

Route::get('/account', function () {
    return view('account');
});

Route::get('/application/{id}', [App\Http\Controllers\ServicesController::class, 'application']);

Route::get('/addservice', function () {
    return view('addservice');
});

//Fallback Route
Route::fallback(errorManager::class);
