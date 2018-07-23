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

Route::redirect('/', 'valves', 301);

Auth::routes();

Route::resource('valves', 'ValveController');
Route::get('tests/{test}', 'TestsController@show');
Route::get('tests/create/{valveID}', 'TestsController@create');
Route::post('tests/create/{valve}', 'TestsController@store');
Route::delete('tests/{test}', 'TestsController@destroy')->name('tests.destroy');
Route::post('search', 'ValveController@search');
Route::get('certificate/{valve}', 'ValveController@certificate');
Route::get('/declaration', 'ValveController@declaration');
