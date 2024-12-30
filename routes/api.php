<?php

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('post', [CrudController::class, 'post']);
Route::get('get', [CrudController::class, 'get_data']);
Route::get('get/{id}', [CrudController::class, 'get_id']);
Route::put('update/{id}', [CrudController::class, 'update']);
Route::delete('delete/{id}', [CrudController::class, 'delete']);
