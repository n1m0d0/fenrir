<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiProfileController;
use App\Http\Controllers\ApiCategoryController;
use App\Http\Controllers\ApiDetailController;
use App\Http\Controllers\ApiOrderController;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\ApiSubcategoryController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', [ApiAuthController::class, "login"]);

Route::get('logout', [ApiAuthController::class, "logout"])->middleware('auth:api');
Route::get('getUser', [ApiAuthController::class, "getUSer"])->middleware('auth:api');

Route::apiResources([
    'profile' => ApiProfileController::class,
    'category' => ApiCategoryController::class,
    'subcategory' => ApiSubcategoryController::class,
    'product' => ApiProductController::class,
]);

Route::apiResource('user', ApiUserController::class);

Route::apiResources([
    'order' => ApiOrderController::class,
    'deteail' => ApiDetailController::class,
]);