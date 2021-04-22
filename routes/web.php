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

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('CheckRole');
Route::get('/admin/users', [App\Http\Controllers\back\UserController::class, 'index'])->name('admin.users')->middleware('CheckRole');


Route::get('/', function () {
    return view('front.main');
})->name('main');

Route::get('/profile/{user}', [UserController::class, 'edit'])->name('profile');
Route::post('/update/{user}', [UserController::class, 'update'])->name('profileupdate');

Route::get('admin/profile/{user}', [App\Http\Controllers\back\UserController::class, 'edit'])->name('admin.profile');
Route::post('admin/update/{user}', [App\Http\Controllers\back\UserController::class, 'update'])->name('admin.profileupdate');
Route::get('admin/delete/{user}', [App\Http\Controllers\back\UserController::class, 'destroy'])->name('admin.delete');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
