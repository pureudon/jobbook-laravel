<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\BookController;
// use App\Http\Controllers\RatingController;

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

Route::get('/testapi', function () {
    return 'hihi api';
});

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('profile', [\App\Http\Controllers\AuthController::class, 'profile']);

// Route::apiResource('books', \App\Http\Controllers\BookController::class);
Route::get('books',[\App\Http\Controllers\BookController::class, 'index'])->name('datatypes.index');
Route::post('books',[\App\Http\Controllers\BookController::class, 'store'])->name('datatypes.store');
Route::get('books/{book}',[\App\Http\Controllers\BookController::class, 'show'])->name('datatypes.show');
Route::patch('books/{book}',[\App\Http\Controllers\BookController::class, 'update'])->name('datatypes.update');
Route::delete('books/{book}',[\App\Http\Controllers\BookController::class, 'destroy'])->name('datatypes.destroy');

Route::post('books/{book}/ratings', [\App\Http\Controllers\RatingController::class, 'store']);
