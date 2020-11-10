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

//Route::post('brewery','BreweryController@store');
//Route::get('brewery/{brewery}','BreweryController@show');
//Route::get('brewery/{brewery}/beers','BreweryController@show_comments');
//Route::get('brewery/{brewery}/best-beer','BreweryController@show_best_comment');

Route::get('brewery/{brewery}',  [\App\Http\Controllers\BreweryController::class, 'show']);

Route::get('/brewery-search/{breweryID}', [\App\Http\Controllers\BreweryController::class, 'showBreweryLocationsById']);

Route::get('/breweries', [\App\Http\Controllers\BreweryController::class, 'index']);

Route::get('/brewery/{brewery}/beers', [\App\Http\Controllers\BreweryController::class, 'show_beers']);

Route::get('/brewery/create', [\App\Http\Controllers\BreweryController::class, 'create']);

Route::get('/breweryLocation/{breweryLocation}', [\App\Http\Controllers\BreweryLocationController::class, 'show']);


Route::delete('/brewery/{brewery}','BreweryController@destroy');
//
//Route::post('brewery/{brewery}/beer','CommentController@store');
//Route::post('comment/{comment}/best-comment','CommentController@best_comment');
//Route::get('comments','CommentController@index');
//Route::get('comment/{comment}', 'CommentController@show');
//Route::delete('comment/{comment}','CommentController@destroy');
