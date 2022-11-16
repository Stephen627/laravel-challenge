<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DogController;

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

Route::get('/breed', [ DogController::class, 'list' ]);
Route::get('/breed/random', [ DogController::class, 'showRandom' ]);
Route::get('/breed/{breed}', [ DogController::class, 'show' ]);
/**
 * I think I mis-understood the requirement here because my other breed endpoints are returning the images so not
 * sure what to return for this one?
 */
Route::get('/breed/{breed}/image', [ DogController::class, 'showImage' ]);
