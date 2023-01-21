<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputProductController;
use App\Http\Controllers\OutProductController;
use App\Http\Controllers\HistoryInputProductController;
use App\Models\HistoryInputProduct;

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

Route::resource('/storeproduct', InputProductController::class)->except(['show']);
Route::resource('/outproduct', OutProductController::class)->except(['show', 'create', 'store', 'edit', 'update']);
Route::resource('/historyproduct', HistoryInputProductController::class)->except(['show', 'create', 'store', 'edit', 'update']);
Route::post('/storeproduct_into_outproduct/{id}', [InputProductController::class, 'moving']);
