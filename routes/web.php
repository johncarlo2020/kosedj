<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;

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
})->name('welcome');

Route::get('/qr', function () {
    return view('error');
});

Route::get('/admin/login', function () {
    return view('auth.admin-login');
});

Route::get('/test', 'App\Http\Controllers\StationController@test')->name('test');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin', 'App\Http\Controllers\StationController@admin')->name('admin');
    Route::get('/admin/users', 'App\Http\Controllers\StationController@users')->name('users');
    Route::get('/admin/{user}', 'App\Http\Controllers\StationController@userData')->name('userData');
    Route::post('/admin/verify/{user}', 'App\Http\Controllers\StationController@verify')->name('verify.email');
    Route::post('/admin/check', 'App\Http\Controllers\StationController@check')->name('check');
});

Route::group(['middleware' => ['client', 'verified']], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/station/{station}', 'App\Http\Controllers\StationController@index')->name('station');
    Route::get('/dashboard', 'App\Http\Controllers\StationController@welcome')->name('dashboard');
    Route::post('/process_qr_code', 'App\Http\Controllers\StationController@scan')->name('process_qr_code');
    Route::get('/station/{station}/extension', 'App\Http\Controllers\StationController@extension')->name('station.extension');
    Route::get('/station/{station}/brand', 'App\Http\Controllers\StationController@brand')->name('station.brand');
    Route::get('/survey', 'App\Http\Controllers\StationController@survey')->name('survey');
    Route::post('/answerSurvey', 'App\Http\Controllers\StationController@answerSurvey')->name('answerSurvey');
    Route::get('/congrats', 'App\Http\Controllers\StationController@congrats')->name('congrats');
    Route::post('/lang', 'App\Http\Controllers\StationController@lang')->name('lang');

});

require __DIR__ . '/auth.php';
