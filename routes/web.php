<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InternshipsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TeamsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('internships', InternshipsController::class)->only(['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']);

Route::resource('categories',CategoriesController::class);

Route::resource('teams', TeamsController::class);

Route::resource('combinations', 'CombinationsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('stages', 'StagesController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);