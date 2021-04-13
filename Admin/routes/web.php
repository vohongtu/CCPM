<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
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
Route::get('/login','UserController@getLogin')->name('login');
Route::post('/index','UserController@Login')->name('loginn');


Route::get('/logout', function () {
    Auth::logout();
    
    return redirect()->route('login');
})->name('logout');
Route::get('/doctor','UserController@doctor')->name('doctor');
Route::group(['middleware' => 'CheckAdmin'], function () {
    Route::get('/', function () {
        return view('index');
    });

    Route::get('/calendar','UserController@Calendar')->name('calendar');
    Route::get('/addCalendar','UserController@AddCalendar')->name('addCalendar');
    Route::get('/Booking','UserController@Booking')->name('Booking');
}); 

Route::get('test', function () {
   $a = Session::get('id_user');
   echo $a;


});