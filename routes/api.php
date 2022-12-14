<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => 'app'], function () {


    Route::any('/get-checkin-status', [ApiController::class, 'getCheckinStatus']);
    Route::any('/guest-list', [ApiController::class, 'guestList']);
    Route::any('/sms-send', [ApiController::class, 'smsSend']);
});

