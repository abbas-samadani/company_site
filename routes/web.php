<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\AdminController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;

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
Auth::routes();

Route::prefix('admin')->middleware('CheckRole')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [App\Http\Controllers\back\UserController::class, 'index'])->name('admin.users');
    Route::get('/users/status/{user}', [App\Http\Controllers\back\UserController::class, 'updateStatus'])->name('admin.users.status');
    Route::get('/profile/{user}', [App\Http\Controllers\back\UserController::class, 'edit'])->name('admin.profile');
    Route::post('/update/{user}', [App\Http\Controllers\back\UserController::class, 'update'])->name('admin.profileupdate');
    Route::get('/delete/{user}', [App\Http\Controllers\back\UserController::class, 'destroy'])->name('admin.delete');
});

Route::prefix('admin/categories')->middleware('CheckRole')->group(function(){
    Route::get('/', [App\Http\Controllers\back\CategoryController::class, 'index'])->name('admin.categories');
    Route::get('/create', [App\Http\Controllers\back\CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/store', [App\Http\Controllers\back\CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/edit/{category}', [App\Http\Controllers\back\CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/update/{category}', [App\Http\Controllers\back\CategoryController::class, 'update'])->name('admin.categories.update');
    Route::get('/destroy/{category}', [App\Http\Controllers\back\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});



Route::get('/', function () {
    return view('front.main');
})->name('main');

Route::get('/profile/{user}', [UserController::class, 'edit'])->name('profile');
Route::post('/update/{user}', [UserController::class, 'update'])->name('profileupdate');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
