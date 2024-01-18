<?php

use Illuminate\Support\Facades\Route;
use Modules\User\app\Http\Controllers\UserController;

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


Route::group(['middleware' => 'guest'], function () {
    Route::get('user/login',[UserController::class,'login'])->name('user.login');
    Route::post('user/login',[UserController::class,'postLogin'])->name('user.postLogin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class,'dashboard'])->name('dashboard');
    Route::get('user/logout', [UserController::class,'logout'])->name('user.logout');
    Route::resource('user', UserController::class)->names('user');
    Route::get('dashboard', [UserController::class,'dashboard'])->name('dashboard');
});
