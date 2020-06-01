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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'DashboardController@index')->name('dashboard.index');

Route::get('/members/fellowship', 'FellowshipController@index')->name('fellowship.index');

Route::get('/members', 'MemberController@index')->name('member.index');
Route::get('/members/born-on', 'MemberController@bornOn')->name('member.birthday');
Route::get('/member/create', 'MemberController@create')->name('member.create');
Route::get('/member/show/{id}', 'MemberController@show')->name('member.show');
Route::post('/member/store', 'MemberController@store')->name('member.store');
Route::get('/member/edit/{id}', 'MemberController@edit')->name('member.edit');
Route::patch('/member/update/{id}', 'MemberController@update')->name('member.update');
Route::delete('/member/destroy/{id}', 'MemberController@destroy')->name('member.destroy');

Route::get('/events', 'EventController@index')->name('event.index');
Route::get('/event/create', 'EventController@create')->name('event.create');
Route::post('/event/store', 'EventController@store')->name('event.store');
Route::get('/event/show/{id}', 'EventController@show')->name('event.show');
Route::get('/event/edit/{id}', 'EventController@edit')->name('event.edit');
Route::patch('/event/update/{id}', 'EventController@update')->name('event.update');
Route::delete('/event/destroy/{id}', 'EventController@destroy')->name('event.destroy');

Route::get('/event/cat', 'EventCatController@index')->name('eventcat.index');
Route::get('/event/cat/create', 'EventCatController@create')->name('eventcat.create');
Route::post('/event/cat/store', 'EventCatController@store')->name('eventcat.store');
Route::get('/event/cat/edit/{id}', 'EventCatController@edit')->name('eventcat.edit');
Route::patch('/event/cat/update/{id}', 'EventCatController@update')->name('eventcat.update');
Route::delete('/event/cat/destroy/{id}', 'EventController@destroy')->name('eventcat.destroy');

Route::get('/sendmail', 'MemberController@send_mail');