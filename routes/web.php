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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'DashboardController@index')->name('dashboard.index');

Route::get('/attendance/dashboard', function () {
    return view('attendance.dashboard', ['page_title' => 'attendance']);
});
Route::get('/attendance/end', 'AttendanceMetaController@endAttendance')->name('attendance.end');
Route::get('/attendance/attendants/{meta_id}', 'AttendanceController@attendants')->name('attendance.detail');

Route::get('/attendance', 'AttendanceMetaController@index')->name('attendance.index');
Route::get('/attendance/manage', 'AttendanceMetaController@manage')->name('attendance.manage');
Route::get('/attendance/create', 'AttendanceMetaController@create')->name('attendance.create');
Route::post('/attendance/store', 'AttendanceMetaController@store')->name('attendance.store');
Route::post('/attendance/member/present', 'AttendanceController@present')->name('attendance.present');
Route::get('/attendace/category/manage', 'AttendanceMetaController@manageCategory')->name('attendance.category.manage');
Route::get('/attendance/category/create', 'AttendanceMetaController@createCategoryPage')->name('attendance.category.create');
Route::post('/attendance/category/store', 'AttendanceMetaController@storeCategory')->name('attendance.category.store');
Route::get('/attendance/list/{meta_id}', 'AttendanceMetaController@show')->name('attendance.show');
Route::get('/attendance/category/edit/{id}', 'AttendanceMetaController@editCategoryPage')->name('attendance.category.edit');
Route::patch('/attendance/category/update/{id}', 'AttendanceMetaController@updateCategory')->name('attendance.category.update');
Route::delete('/attendance/category/destroyCategory/{id}', 'AttendanceMetaController@destroyCategory')->name('attendance.category.destroy');


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
