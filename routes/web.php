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
Route::get('notes/create', 'NotesController@create');
Route::post('notes', 'NotesController@store');
Route::get('notes/{note}', 'NotesController@show');
Route::get('notes/{note}/edit', 'NotesController@edit');
Route::patch('notes/{note}', 'NotesController@update');
Route::delete('notes/{note}', 'NotesController@destroy');

Route::get('skills','SkillsController@index');
Route::get('skills/create', 'SkillsController@create');
Route::post('skills', 'SkillsController@store');
Route::get('skills/{skill}', 'SkillsController@show');
Route::get('skills/{skill}/edit', 'SkillsController@edit');
Route::patch('skills/{skill}', 'SkillsController@update');
Route::delete('skills/{skill}', 'SkillsController@destroy');