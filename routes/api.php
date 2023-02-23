<?php

use App\Http\Controllers\AdvertisementsController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
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

Route::group([
    'middleware' => ['api'],
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', [RegistrationController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
    Route::get('profile', [ProfileController::class, 'get']);
    Route::put('profile', [ProfileController::class, 'put']);
    Route::put('profile/change-password', [ProfileController::class, 'changePassword']);
    Route::delete('profile', [ProfileController::class, 'delete']);
    Route::post('logout', [ProfileController::class, 'logout']);
});

Route::middleware(['auth.jwt'])->group(function () {
    Route::resource('advertisements', AdvertisementsController::class)->except('index', 'show');
    Route::resource('reviews', ReviewsController::class);
});

Route::resource('advertisements', AdvertisementsController::class)->only('index', 'show');


