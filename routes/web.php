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
// login
Route::get('/get-warning-log', 'AuthController@warningLogin')->name('warningLogin');
Route::get('/get-error-log', 'AuthController@errorLogin')->name('errorLogin');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
// registrasi
Route::get('/get-warning-reg', 'AuthController@warningRegistrasi')->name('warningRegistrasi');
Route::get('/get-success-reg', 'AuthController@successAuthReg')->name('successRegistrasi');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/user/create', 'AuthController@postregister');


Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    // reservasi
    Route::get('/get-success-konf', 'reservasiController@successCheckIn')->name('successCheckIn');
    Route::get('/dashboard', 'reservasiController@dashboardAdmin');
    Route::post('/reservasi/{id}/checkin', 'reservasiController@konfirmasiReservasi');
    Route::get('/history', 'reservasiController@history');
    // fasilitas
    Route::get('/get-warning', 'fasilitasController@warningFacility')->name('warningFasilitas');
    Route::get('/get-success', 'fasilitasController@successFacility')->name('successFasilitas');
    Route::get('/get-error', 'fasilitasController@errorFacility')->name('errorFasilitas');
    Route::get('/facility', 'fasilitasController@showFasilitas')->name('fasilitas');
    Route::post('/facility/create', 'fasilitasController@addFasilitas');
    Route::post('/facility/{id}/edit', 'fasilitasController@editFasilitas');
    Route::post('/facility/{id}/hapus', 'fasilitasController@hapusFasilitas');
    Route::get('/listwisatawan', 'AuthController@showDataWisatawan');
});

Route::group(['middleware' => ['auth', 'checkRole:wisatawan']], function(){
    // reservasi
    Route::get('/dashboardwisatawan', 'reservasiController@dashboardWisatawan');
    Route::get('/pembayaran', 'reservasiController@pembayaran');
    Route::get('/reservasi', 'reservasiController@reservasi');
    Route::post('/reservasi/create', 'reservasiController@create');
    Route::get('/reservasi/detail/{id}', 'reservasiController@detail')->name('detail');
    Route::post('orders/checkout', 'reservasiDetailController@book')->name('checkout');
    Route::get('orders/received/{reservasiID}', 'reservasiDetailController@received');
    Route::put('/add/{id}', 'reservasiDetailController@save')->name('save');
    Route::delete('/delete/{id}', 'reservasiDetailController@deleteFasilitas')->name('delete');
    Route::post('/reservasi/detail/{id}/book', 'reservasiDetailController@book')->name('book');
    Route::post('/reservasi/{id}/bayar', 'reservasiController@bayar');
    Route::post('/reservasi/{id}/unduh', 'reservasiController@unduhpdf');
    // profile
    Route::get('/get-success-prof', 'AuthController@successUpdate')->name('successUpdate');
    Route::get('/get-error-prof', 'AuthController@errorUpdateProfile')->name('errorUpdate');
    Route::get('/profile', 'AuthController@profile');
    Route::post('/user/{id}/edit', 'AuthController@editProfile');
    Route::get('/event', 'reservasiController@event');
});

