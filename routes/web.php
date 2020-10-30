<?php

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

//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/', [\App\Http\Controllers\BeerController::class, 'getAll']);

Route::get('/beer/create', [\App\Http\Controllers\BeerController::class, 'create']);

Route::get('/beer/{beer}', [\App\Http\Controllers\BeerController::class, 'showLocationsById']);

Route::get('/location/{location}', [\App\Http\Controllers\LocationController::class, 'show']);


