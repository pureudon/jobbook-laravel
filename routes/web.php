<?php

// Facades
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\CompanyController;
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
})->name('welcome');
Route::get('/apple', function () {
    return 'hihi apple';
});
Route::get('/bootstrap5', function () {
    return view('bootstrap5.test');
})->middleware(['auth'])->name('bootstrap5');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::view('profile','profile')->name('profile');
    Route::get('profile',[\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
});

require __DIR__.'/auth.php';




// Route::resource('datatypes', DatatypeController::class);
Route::get('datatypes',[DatatypeController::class, 'index'])->name('datatypes.index');
Route::get('datatypes/create',[DatatypeController::class, 'create'])->name('datatypes.create');
Route::post('datatypes',[DatatypeController::class, 'store'])->name('datatypes.store');
Route::get('datatypes/{id}',[DatatypeController::class, 'show'])->name('datatypes.show');
Route::get('datatypes/{id}/edit',[DatatypeController::class, 'edit'])->name('datatypes.edit');
Route::patch('datatypes/{id}',[DatatypeController::class, 'update'])->name('datatypes.update');
Route::delete('datatypes/{id}',[DatatypeController::class, 'destroy'])->name('datatypes.destroy');


// Route::resource('company', CompanyController::class);
Route::get('company',[CompanyController::class, 'index'])->middleware(['auth'])->name('company.index');
Route::get('company/create',[CompanyController::class, 'create'])->name('company.create');
Route::post('company',[CompanyController::class, 'store'])->name('company.store');
Route::get('company/{id}/edit',[CompanyController::class, 'edit'])->name('company.edit');
Route::patch('company/{id}',[CompanyController::class, 'update'])->name('company.update');
Route::delete('company/{id}',[CompanyController::class, 'destroy'])->name('company.destroy');
Route::get('company/{id}/duplicate',[CompanyController::class, 'duplicate'])->name('company.duplicate');
Route::post('company/data',[CompanyController::class, 'data'])->name('company.data');
Route::get('groupchangeform',[CompanyController::class, 'groupchangeform'])->name('company.groupchangeform');
Route::post('groupchangefontcolor',[CompanyController::class, 'groupchangefontcolor'])->name('company.groupchangefontcolor');
// company.show place to the last row, conflict with others GET route
Route::get('company/{id}',[CompanyController::class, 'show'])->name('company.show');