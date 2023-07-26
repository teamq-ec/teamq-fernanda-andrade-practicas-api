<?php

use App\Models\Movie;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});
use App\Http\Controllers\MovieController;
Route::resource('movies', MovieController::class);


Route::get('/movies', [MovieController::class, 'index']);
//Route::get('movies','MovieController@index');



Route::get('/movies/{id}', [MovieController::class, 'show']);
//Route::get('movies/{id}','MovieController@show');


Route::post('/movies', [MovieController::class, 'store']);
//Route::post('movies','MovieController@store');

Route::put('/movies/{id}', [MovieController::class, 'update']);
//Route::put('movies/{id}', 'MovieController@update');

Route::delete('/movies/{id}', [MovieController::class, 'delete']);
//Route::delete('movies/{id}','MovieController@delete');


