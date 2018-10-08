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
Auth::routes();

Route::get('/', function() {
  if(Auth::user()) {
    return view('home');
  }
  return view('auth/login');
});

Route::get('/home', function() {
  if(Auth::user()) {
    return view('home');
  }
  return view('auth/login');
});

Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/edit/{id}', 'EmployeeController@edit');
Route::delete('/employees/{id}', 'EmployeeController@destroy');

Route::get('/companies', 'CompanyController@index');
Route::get('/companies/edit/{id}', 'CompanyController@edit');
Route::delete('/companies/{id}', 'CompanyController@destroy');
