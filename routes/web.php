<?php

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
    return view('home');
});
Route::get('/todo', 'AuthController@todo');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/register', 'AuthController@register');
Route::post('/user/create', 'AuthController@postregister');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::get('/dashboard', 'dashboardController@admin');
    Route::get('/history', 'reservasiController@history');
    Route::get('/facility', 'fasilitasController@facility');
    Route::post('/facility/create', 'fasilitasController@create');
    Route::post('/facility/{id}/edit', 'fasilitasController@editFasilitas');
    Route::post('/facility/{id}/hapus', 'fasilitasController@hapusFasilitas');
});

Route::group(['middleware' => ['auth', 'checkRole:wisatawan']], function(){
    Route::get('/dashboardwisatawan', 'dashboardController@wisatawan');
    Route::get('/reservasi', 'reservasiController@reservasi');
    Route::post('/reservasi/create', 'reservasiController@create');
    Route::put('/reservasi/{id}/bayar', 'reservasiController@bayar');
    Route::post('/reservasi/{id}/unduh', 'reservasiController@unduhpdf');
    Route::get('/profile', 'profileController@profile');
    Route::post('/user/{id}/edit', 'profileController@editProfile');
    Route::get('/event', 'reservasiController@event');
});