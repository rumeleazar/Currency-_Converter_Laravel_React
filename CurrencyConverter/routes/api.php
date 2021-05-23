<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\CurrencyController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API ENDPOINT FOR RETRIEVING DATA
Route::post('/filldatabase',[CurrencyController::class, "getRates"])->name('controller.getRates');

//API ENDPOINT FOR DELETING ALL DATA IN DATABASE
Route::delete('/delete',[CurrencyController::class, "delete"]);

//API ENDPOINT FOR GETTING ALL DATA IN DATABASE
Route::get('/controller',[CurrencyController::class, "getConversion"])->name('controller.getConversion');

//API ENDPOINT FOR MAIN CURRENCY CONVERTER FUNCTION
Route::post('/controller',[CurrencyController::class, "getCurrencyConvert"])->name('controller.getCurrencyConvert');

