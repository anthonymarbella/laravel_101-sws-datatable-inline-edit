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

Route::get('/users/list', function () {
    return view('users.list');
});


Route::get('users/list/json', 'App\Http\Controllers\UserController@json')->name('users.list.json');
Route::post('users/tabledit/action', 'App\Http\Controllers\UserController@action')->name('users.tabledit.action');