<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes(['register'=>false]);



Route::get('/', 'HomeController@index')->middleware('auth');
// Route::get('/', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');



// Announcements page
Route::get('/announcements', 'AnnouncementController@index')->middleware('auth');

// Detailed announcements page
Route::get('/announcements/{id}', 'AnnouncementController@show')->middleware('auth');


// Documents Page
Route::get('/documents', 'DocumentController@index')->middleware('auth');


// Documents Single Page
Route::get('/documents/{id}', 'DocumentController@show')->middleware('auth');

// Events page
Route::get('/events', 'EventController@index')->middleware('auth');

// Single Events page
Route::get('/events/{id}', 'EventController@show')->middleware('auth');


// News page
Route::get('/news', 'NewsController@index')->middleware('auth');

// News page
Route::get('/news/{id}', 'NewsController@show')->middleware('auth');


// Staff Members Page
Route::get('/staff', 'StaffController@index')->middleware('auth');

Route::get('/staff/{id}', 'StaffController@show')->middleware('auth');


// Departments Page
Route::get('/departments', 'DepartmentController@index')->middleware('auth');

Route::get('/departments/{id}', 'DepartmentController@show')->middleware('auth');

// Emergency Page
Route::get('/emergency', 'EmergencyController@index')->middleware('auth');


// Wall Of Fame Page
Route::get('/walloffame', 'WalloffameController@index')->middleware('auth');

Route::get('/computerassistance', 'ComputerAssistanceController@index')->middleware('auth');

Route::post('/computerassistance', 'ComputerAssistanceController@store');

Route::post('/incidentreporting', 'IncidentReportingController@store');

//Route::post('/pdf','PdfController@open_pdf');



