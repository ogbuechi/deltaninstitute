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

Route::get('/secret/make_admin/{code}/{email}', 'HomeController@makeAdmin');

Route::get('/', function () {
    return redirect('http://www.deltainstitute.org.ng/');
})->name('root');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/admission/start', 'AdmissionController@start')->name('admission.start');
    Route::get('/admission/continue', 'AdmissionController@continue')->name('admission.continue');
    Route::get('/admission/print', 'AdmissionController@print')->name('admission.finish');
    Route::post('admission', 'AdmissionController@store')->name('admission.stores');
    Route::post('/admission/update', 'AdmissionController@update')->middleware('auth');
    Route::post('/admission/post_primaries', 'AdmissionController@storePostPrimary')->middleware('auth');
    Route::post('/admission/post_primaries/delete', 'AdmissionController@deletePostPrimary')->middleware('auth');
    Route::post('/admission/certifications', 'AdmissionController@storeCert')->middleware('auth');


    Route::get('/download_pdf/{id}', 'AdmissionController@downloadPDF')->name('download_pdf');


    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', 'HomeController@dashboard')->name('admin.dashboard');
        Route::get('/applicants', 'AdmissionController@applicants')->name('admin.applicants');
        Route::get('/printslip/{id}', 'AdmissionController@printSlip')->name('admin.printslip');
    });

});
