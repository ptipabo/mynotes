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

Route::get('/', 'HomeController@index');
Route::get('notes', 'NotesController@index');
Route::get('notes/%id', 'NotesController@show');
Route::get('notes/create', 'NotesController@create');
Route::get('skills','SkillsController@index');
