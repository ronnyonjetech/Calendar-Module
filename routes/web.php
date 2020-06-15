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

/*Route::get('/', function () {
    return view('fullcalendar');
});
Route::post('/delete', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('fullcalendar');
});
Route::get('/userside',function(){
    return view('userSide');
});
Route::post('/fullcalendar/index', 'FullCalendar@index');
Route::post('/fullcalendar/update', 'FullCalendar@update');
Route::post('/fullcalendar/insert', 'FullCalendar@insert');
Route::post('/fullcalendar/load', 'FullCalendar@load');
Route::post('/fullcalendar/delete','FullCalendar@delete');
