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

Route::get('/companies', 'CompanyController@index');
Route::get('/companies/create', 'CompanyController@create');
Route::get('/companies/{id}', 'CompanyController@show');
Route::get('/companies/{id}/show', 'CompanyController@show');
Route::get('/companies/{id}/edit', 'CompanyController@edit');

Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/create', 'EmployeeController@create');
Route::get('/employees/{id}', 'EmployeeController@show');
Route::get('/employees/{id}/show', 'CompanyController@show');
Route::get('/employees/{id}/edit', 'EmployeeController@edit');

Route::put('/companies/{id}/edit', 'CompanyController@update');
Route::put('/employees/{id}/edit', 'EmployeeController@update');

Route::post('/companies/create', 'CompanyController@store');
Route::post('/employees/create', 'EmployeeController@store');

Route::delete('/companies/{id}/delete', 'CompanyController@destroy');
Route::delete('/employees/{id}/delete', 'EmployeeController@destroy');
