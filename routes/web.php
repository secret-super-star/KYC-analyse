<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/dashboard');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::resource('users', App\Http\Controllers\UserController::class);

Route::post('searchcustomers', [App\Http\Controllers\UserController::class, 'search'])->name('searchcustomers');

Route::post('getallcustomers', [App\Http\Controllers\UserController::class, 'searchall'])->name('getallcustomers');

Route::post('searchtags', [App\Http\Controllers\TagController::class, 'searchtags'])->name('searchtags');

Route::resource('bonus', App\Http\Controllers\BonusController::class);

Route::resource('notes', App\Http\Controllers\CustomernoteController::class);

Route::get('getusers', [App\Http\Controllers\UserController::class, 'getusers'])->name('getusers');

Route::get('sendmessage', [App\Http\Controllers\UserController::class, 'getusers'])->name('sendmessage');
