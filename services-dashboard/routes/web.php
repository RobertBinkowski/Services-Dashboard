<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\errorManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SignatureController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\StripeController;

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
    //Complete
    Route::post('/complete', [ServicesController::class, 'complete']);
    //Payment
    Route::get('/payment/{id}', [StripeController::class, 'stripe']);
    Route::post('/payment', [StripeController::class, 'stripePost'])->name('stripe.post');
    //Review
    Route::get('/review/{id}', [ServicesController::class, 'reviewPage']);
    Route::post('/review', [ServicesController::class, 'review']);
    //Delete
    Route::get('/delete/{id}', [ServicesController::class, 'delete']);
    //Add operation
    Route::prefix('/operation')->group( function () {
        //Create
        Route::get('/create/{id}', [OperationController::class, 'createForm']);
        Route::post('/create',[OperationController::class, 'create']);
        //Edit
        Route::get('/edit/{id}',[OperationController::class, 'edit']);
        Route::post('/edit',[OperationController::class, 'update']);
    });

});

Route::prefix('/signature')->group(function (){
    Route::get('/form',[SignatureController::class,"getForm"]);
    Route::post('/form',[SignatureController::class,"confirm"]);
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
    Route::get('/show/{id}', [ContractController::class, 'index']);
    Route::post('/update', [ContractController::class, 'update']);
    Route::post('/acceptContract', [ContractController::class, 'acceptContract']);
    Route::get('/reject/{id}', [ContractController::class, 'rejectContract']);
    Route::post('/reject', [ContractController::class, 'rejectContract']);
});

//Policy
Route::get('/policy',function (){ return view('policy'); });

//Fallback Route
Route::fallback(errorManager::class);
