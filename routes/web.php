<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/test', function () {


    return view('test');        });
Route::get('/admin', function () {      return view('administrator.dashboard');    })->middleware('admin')->name('admin');
Auth::routes();
// home
Route::get('/home', 'HomeController@index')->name('home');
// student
Route::resource('/form', 'FormController')->middleware('student');
Route::get('/downloadPDF','FormController@generatePDF')->middleware('student')->name('downloadPDF');
// supervisor
Route::resource('/supervisor','SupervisorController' )->except('destroy')->middleware('supervisor');
Route::get('/defenseDownloadPDF/{id}','DefenseController@generatePDF')->middleware('supervisor')->name('supervisorDownloadPDF');

//Defenses
Route::resource('/defense', 'DefenseController')->except(['destroy', 'create', 'show'])->middleware('supervisor');
Route::get('/defense/allAccepted','DefenseController@showAcceptedDefences')->middleware('supervisor')->name('allAccepted');
Route::post('/defense/refuse','DefenseController@storeRefusedDefense')->middleware('supervisor')->name('storeRefusedDefense');
Route::get('/defense/allRefused','DefenseController@showRefusedDefences')->middleware('supervisor')->name('showRefusedDefences');


// change password
Route::get('/changePassword', 'ChangePasswordController@index')->middleware('student')->name('studentPassword');
Route::get('/change-password', 'ChangePasswordController@supervisor');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
