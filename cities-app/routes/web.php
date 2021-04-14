<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

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

Route::get('/', [CityController::class, 'index']);
Route::post('/search', [CityController::class, 'search']);
Route::get('/city/{id}',[CityController::class, 'detail'])->name('detail');
