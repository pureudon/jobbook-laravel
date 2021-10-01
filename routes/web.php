<?php

// Facades
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\DatatypeController;

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
Route::get('/apple', function () {
    return 'hihi apple';
});
Route::get('/bootstrap5', function () {
    return view('bootstrap5.test');
});

// Route::resource('datatypes', DatatypeController::class);
Route::get('datatypes',[DatatypeController::class, 'index'])->name('datatypes.index');
Route::get('datatypes/create',[DatatypeController::class, 'create'])->name('datatypes.create');
Route::post('datatypes',[DatatypeController::class, 'store'])->name('datatypes.store');
Route::get('datatypes/{id}',[DatatypeController::class, 'show'])->name('datatypes.show');
Route::get('datatypes/{id}/edit',[DatatypeController::class, 'edit'])->name('datatypes.edit');
Route::patch('datatypes/{id}',[DatatypeController::class, 'update'])->name('datatypes.update');
Route::delete('datatypes/{id}',[DatatypeController::class, 'destroy'])->name('datatypes.destroy');