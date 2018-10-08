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
Route::put('/employees/{id}/edit', 'EmployeeController@edit');
Route::delete('/employees/{id}', 'EmployeeController@destroy');
Route::get('/employees/create', 'EmployeeController@create');
Route::post('/employees/create', 'EmployeeController@store');

Route::get('/companies', 'CompanyController@index');
Route::put('/companies/{id}/edit', 'CompanyController@edit');
Route::delete('/companies/{id}', 'CompanyController@destroy');
Route::get('/companies/create', 'CompanyController@create');
Route::post('/companies/create', 'CompanyController@store');
