<?php

use App\Http\Controllers\errorManager;
use App\Http\Controllers\Services;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContractController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/search', function () {return view('search');});

//Service Routes
Route::get('/service/{id}', [ServicesController::class, 'show']);
Route::get('/myservices', [ServicesController::class, 'myservices']);
Route::get('/apply/{id}', [ContractController::class, 'index']);
Route::post('/apply',[ContractController::class, 'store']);

//Account
Route::get('/account', function () {
    return view('account');
});
//Create Service
Route::get('/addservice', function () {
    return view('addservice');
});

//Fallback Route
Route::fallback(errorManager::class);
