<?php

use App\Work;
use Illuminate\Http\Request;


Route::get('/works', 'WorksController@index')->name('works.index');
Route::get('/works/writing', 'WorksController@writing')->name('works.writing');
Route::get('/works/about' , 'WorksController@about')->name('works.about');
Route::get('/works/details/{id}', 'WorksController@details')->name('works.details');
Route::get('/works/add', 'WorksController@add')->name('works.add');
Route::post('/works/insert', 'WorksController@insert')->name('works.insert');
Route::get('/works/edit/{id}', 'WorksController@edit')->name('works.edit');
Route::post('/works/update/{id}', 'WorksController@update')->name('works.update');
Route::get('/works/delete/{id}', 'WorksController@delete')->name('works.delete');