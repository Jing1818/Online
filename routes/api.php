<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\IndexController;
use App\Http\Controllers\Api\V1\InternshipController;
use App\Http\Controllers\Auth\WechatLoginController;
use App\Http\Controllers\Api\V1\AuthorizasController;
use App\Http\Controllers\Api\V1\UserController;
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
Route::group(['prefix'=>'v1'],function () {
    Route::get('index', [IndexController::class, 'index']);
    Route::get('internship/{internship}', [InternshipController::class, 'detail']);
    Route::post('weapp/authorizations', [AuthorizasController::class, 'weappstore']);
    Route::post('weapp/code', [UserController::class, 'sendCode'])->name('weapp.code.send');
    Route::post('weapp/code/verify',[UserController::class,'verifyCode'])->name('weapp.code.verify');
});
