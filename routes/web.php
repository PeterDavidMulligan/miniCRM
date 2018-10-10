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
Route::get('/companies', 'CompanyController@index');

Route::get('/employees/{id}/edit', 'EmployeeController@edit');
Route::put('/employees/{id}/edit', 'EmployeeController@update');

Route::get('/employees/create', 'EmployeeController@create');
Route::post('/employees/create', 'EmployeeController@store');

Route::get('/companies/{id}/show', 'CompanyController@show');

Route::get('/companies/{id}/edit', 'CompanyController@edit');
Route::put('/companies/{id}/edit', 'CompanyController@update');

Route::get('/companies/create', 'CompanyController@create');
Route::post('/companies/create', 'CompanyController@store');

Route::delete('/companies/{id}', 'CompanyController@destroy');
Route::delete('/employees/{id}', 'EmployeeController@destroy');
