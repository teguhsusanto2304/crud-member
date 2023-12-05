<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::controller(\App\Http\Controllers\LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::post('/save', 'save')->name('save-admin');
    Route::put('/update-admin/{id}', 'update_admin')->name('update-admin');
    Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/add', 'add')->name('add');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::get('/profile/{id}', 'profile')->name('profile');
    Route::post('/logout', 'logout')->name('logout');
});