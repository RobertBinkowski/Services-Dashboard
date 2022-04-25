<?php

use App\Http\Controllers\errorManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;

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

/*
    Routes

    PUT - Update
    PATCH - Modify
    DELETE - Delete
    OPTIONS - Ask server which are allowed

*/

//Home View
Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/search')->group( function () {
    Route::get('/', [SearchController::class, "index"]);
    // Route::post('/{name}', [SearchController::class, "searchName"]);
    Route::post('/{id}', [SearchController::class, "searchID"]);
});

//Service Routes
Route::prefix('/service')->group( function () {
    Route::get('/', [ServicesController::class, 'myservices']);
    Route::get('/{id}', [ServicesController::class, 'index']);
    Route::get('/{name}', [ServicesController::class, 'name']);
    Route::get('/apply/{id}', [ServicesController::class, 'apply']);
    Route::post('/apply',[ContractController::class, 'store']);
    Route::get('/edit/{id}', [ServicesController::class, 'edit']); // Not Finished
});


//Account
Route::get('/account', function () {
    return view('account');
});
//Contract
Route::prefix('/contract')->group(function(){
    Route::get('/', [ContractController::class, 'mycontracts']);
    Route::get('/{id}', [ContractController::class, 'index']);
});

//Create Service
Route::get('/addservice', function () {
    return view('addservice');
});

//Fallback Route
Route::fallback(errorManager::class);
