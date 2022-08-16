<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\errorManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OperationController;

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

//Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Search
Route::prefix('/search')->group( function () {
    Route::get('/', [SearchController::class, "index"]);
    Route::post('/', [SearchController::class, "searchName"]);
    Route::get('/id/{id}', [ServicesController::class, 'find']);

});

//Service Routes
Route::prefix('/service')->group( function () {
    //View
    Route::get('/', [ServicesController::class, 'myservices']);
    Route::get('/id/{id}', [ServicesController::class, 'find']);
    Route::get('/name/{name}', [ServicesController::class, 'name']);
    //Apply
    Route::get('/apply/{id}', [ServicesController::class, 'apply']);
    Route::post('/apply',[ContractController::class, 'store']);
    //Create
    Route::get('/create', [ServicesController::class, 'createForm']);
    Route::post('/create', [ServicesController::class, 'create']);
    //Edit
    Route::get('/edit/{id}', [ServicesController::class, 'edit']);
    Route::post('/edit', [ServicesController::class, 'update']);
    //Delete
    Route::get('/delete/{id}', [ServicesController::class, 'delete']);
    //Add operation
    Route::get('/operation/{id}', [OperationController::class, 'createForm']);
    Route::post('/operation',[OperationController::class, 'create']);
    Route::post('/operation',[OperationController::class, 'create']);
});


//Account
Route::prefix('/account')->group( function (){
    Route::get('/update/{id}',[AccountController::class, "index"]);
    Route::post('/update',[AccountController::class, "update"]);
    Route::get('/delete',[AccountController::class, "delete"]);
});

//Contract
Route::prefix('/contract')->group(function(){
    Route::get('/', [ContractController::class, 'mycontracts']);
    Route::get('/{id}', [ContractController::class, 'index']);
    Route::post('/', [ContractController::class, 'update']);
});

//Policy
Route::get('/policy',function (){ return view('policy'); });

//Fallback Route
Route::fallback(errorManager::class);
