<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

Route::get('/tables', [TableController::class, 'all']);

Route::get('/books',[BookController::class,'getAll']);

Route::get('/books_by_name/{name}',[BookController::class,'getByName']);

Route::post('/books/new',[BookController::class,'addNewBook']);

Route::put('/books/update/{id}', [BookController::class, 'updateExistingBook']);

Route::delete('/books/delete/{id}', [BookController::class, 'deleteExistingBook']);
