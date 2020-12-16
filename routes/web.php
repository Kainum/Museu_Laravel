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

Route::group(['middleware'=>'auth'], function () {
    Route::group(['prefix'=>'artistas', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('',              ['as'=>'artistas',            'uses'=>'ArtistasController@index'    ]);
        Route::get('create',        ['as'=>'artistas.create',     'uses'=>'ArtistasController@create'   ]);
        Route::get('{id}/destroy',  ['as'=>'artistas.destroy',    'uses'=>'ArtistasController@destroy'  ]);
        Route::get('edit',          ['as'=>'artistas.edit',       'uses'=>'ArtistasController@edit'     ]);
        Route::put('{id}/update',   ['as'=>'artistas.update',     'uses'=>'ArtistasController@update'   ]);
        Route::post('store',        ['as'=>'artistas.store',      'uses'=>'ArtistasController@store'    ]);
    });

    Route::group(['prefix'=>'artefatos', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('',              ['as'=>'artefatos',            'uses'=>'ArtefatosController@index'    ]);
        Route::get('create',        ['as'=>'artefatos.create',     'uses'=>'ArtefatosController@create'   ]);
        Route::get('{id}/destroy',  ['as'=>'artefatos.destroy',    'uses'=>'ArtefatosController@destroy'  ]);
        Route::get('edit',          ['as'=>'artefatos.edit',       'uses'=>'ArtefatosController@edit'     ]);
        Route::put('{id}/update',   ['as'=>'artefatos.update',     'uses'=>'ArtefatosController@update'   ]);
        Route::post('store',        ['as'=>'artefatos.store',      'uses'=>'ArtefatosController@store'    ]);
    });

    Route::group(['prefix'=>'obras', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('',              ['as'=>'obras',            'uses'=>'ObrasController@index'    ]);
        Route::get('create',        ['as'=>'obras.create',     'uses'=>'ObrasController@create'   ]);
        Route::get('{id}/destroy',  ['as'=>'obras.destroy',    'uses'=>'ObrasController@destroy'  ]);
        Route::get('edit',          ['as'=>'obras.edit',       'uses'=>'ObrasController@edit'     ]);
        Route::put('{id}/update',   ['as'=>'obras.update',     'uses'=>'ObrasController@update'   ]);
        Route::post('store',        ['as'=>'obras.store',      'uses'=>'ObrasController@store'    ]);
    });

    Route::group(['prefix'=>'salas', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('',              ['as'=>'salas',            'uses'=>'SalasController@index'    ]);
        Route::get('create',        ['as'=>'salas.create',     'uses'=>'SalasController@create'   ]);
        Route::get('{id}/destroy',  ['as'=>'salas.destroy',    'uses'=>'SalasController@destroy'  ]);
        Route::get('edit',          ['as'=>'salas.edit',       'uses'=>'SalasController@edit'     ]);
        Route::put('{id}/update',   ['as'=>'salas.update',     'uses'=>'SalasController@update'   ]);
        Route::post('store',        ['as'=>'salas.store',      'uses'=>'SalasController@store'    ]);
    });

    Route::group(['prefix'=>'eventos', 'where'=>['id'=>'[0-9]+']], function() {
        Route::any('',              ['as'=>'eventos',            'uses'=>'EventosController@index'    ]);
        Route::get('create',        ['as'=>'eventos.create',     'uses'=>'EventosController@create'   ]);
        Route::get('{id}/destroy',  ['as'=>'eventos.destroy',    'uses'=>'EventosController@destroy'  ]);
        Route::get('{id}/edit',     ['as'=>'eventos.edit',       'uses'=>'EventosController@edit'     ]);
        Route::put('{id}/update',   ['as'=>'eventos.update',     'uses'=>'EventosController@update'   ]);
        Route::post('store',        ['as'=>'eventos.store',      'uses'=>'EventosController@store'    ]);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
