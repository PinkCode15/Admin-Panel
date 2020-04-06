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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('auth.login');
// });


Route::group(['middleware' => ['auth']], function () {
Route::get("/","CompaniesController@index");  
Route::get("/employee/showEmployee","EmployeesController@showEmployee");
Route::get("/company/addCompany","CompaniesController@addCompany");
Route::get("/company/showCompany","CompaniesController@showCompany");
Route::get("/employee/addEmployee","EmployeesController@addEmployee");
Route::resource("company","CompaniesController");
Route::resource("employee","EmployeesController");
Route::resource("admin","AdminsController");
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

