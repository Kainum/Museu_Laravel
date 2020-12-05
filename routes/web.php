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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'artistas', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('',              ['as'=>'artistas',            'uses'=>'ArtistasController@index'    ]);
    Route::get('create',        ['as'=>'artistas.create',     'uses'=>'ArtistasController@create'   ]);
    Route::get('{id}/destroy',  ['as'=>'artistas.destroy',    'uses'=>'ArtistasController@destroy'  ]);
    Route::get('{id}/edit',     ['as'=>'artistas.edit',       'uses'=>'ArtistasController@edit'     ]);
    Route::put('{id}/update',   ['as'=>'artistas.update',     'uses'=>'ArtistasController@update'   ]);
    Route::post('store',        ['as'=>'artistas.store',      'uses'=>'ArtistasController@store'    ]);
});

Route::group(['prefix'=>'objetos', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('',              ['as'=>'objetos',            'uses'=>'ObjetosController@index'    ]);
    Route::get('create',        ['as'=>'objetos.create',     'uses'=>'ObjetosController@create'   ]);
    Route::get('{id}/destroy',  ['as'=>'objetos.destroy',    'uses'=>'ObjetosController@destroy'  ]);
    Route::get('{id}/edit',     ['as'=>'objetos.edit',       'uses'=>'ObjetosController@edit'     ]);
    Route::put('{id}/update',   ['as'=>'objetos.update',     'uses'=>'ObjetosController@update'   ]);
    Route::post('store',        ['as'=>'objetos.store',      'uses'=>'ObjetosController@store'    ]);
});

Route::group(['prefix'=>'salas', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('',              ['as'=>'salas',            'uses'=>'SalasController@index'    ]);
    Route::get('create',        ['as'=>'salas.create',     'uses'=>'SalasController@create'   ]);
    Route::get('{id}/destroy',  ['as'=>'salas.destroy',    'uses'=>'SalasController@destroy'  ]);
    Route::get('{id}/edit',     ['as'=>'salas.edit',       'uses'=>'SalasController@edit'     ]);
    Route::put('{id}/update',   ['as'=>'salas.update',     'uses'=>'SalasController@update'   ]);
    Route::post('store',        ['as'=>'salas.store',      'uses'=>'SalasController@store'    ]);
});

Route::group(['prefix'=>'eventos', 'where'=>['id'=>'[0-9]+']], function() {
    Route::get('',              ['as'=>'eventos',            'uses'=>'EventosController@index'    ]);
    Route::get('create',        ['as'=>'eventos.create',     'uses'=>'EventosController@create'   ]);
    Route::get('{id}/destroy',  ['as'=>'eventos.destroy',    'uses'=>'EventosController@destroy'  ]);
    Route::get('{id}/edit',     ['as'=>'eventos.edit',       'uses'=>'EventosController@edit'     ]);
    Route::put('{id}/update',   ['as'=>'eventos.update',     'uses'=>'EventosController@update'   ]);
    Route::post('store',        ['as'=>'eventos.store',      'uses'=>'EventosController@store'    ]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
