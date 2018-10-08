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
  return view('welcome');
});

Route::get('/home', function() {
  if(Auth::user()) {
    return view('home');
  }
  return view('auth/login');
});

Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/edit', 'EmployeeController@edit');
Route::get('/employees/destroy', 'EmployeeController@destroy');

Route::get('/companies', 'CompanyController@index');
Route::get('/companies/edit', 'CompanyController@edit');
Route::get('/companies/destroy', 'CompanyController@destroy');
