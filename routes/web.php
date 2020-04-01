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

use App\Http\Controllers\TokenController;

Route::get('/login', function () {
    return view('auth.login');
});
//
Route::middleware(['auth'])->group(function () {

    Route::group(['prefix'=>'admin', 'middleware'=>'admin'],function () {
        Route::prefix('dept')->group(function () {
            Route::get('/index', ['uses' => 'Admin\DeptController@index', 'as' => 'list.dept']);
            Route::get('/create', ['uses' => 'Admin\DeptController@create', 'as' => 'new.dept']);
            Route::post('/store', ['uses' => 'Admin\DeptController@store', 'as' => 'store.dept']);
            Route::get('/edit', ['uses' => 'Admin\DeptController@edit', 'as' => 'edit.dept']);
            Route::post('/update{id}', ['uses' => 'Admin\DeptController@update', 'as' => 'update.dept']);
            Route::get('/delete', ['uses' => 'Admin\DeptController@delete', 'as' => 'delete.dept']);
        });

        Route::prefix('counter')->group(function () {
            Route::get('/index', ['uses' => 'Admin\CounterController@index', 'as' => 'counter.list']);
            Route::get('/create', ['uses' => 'Admin\CounterController@create', 'as' => 'counter.new']);
            Route::post('/store', ['uses' => 'Admin\CounterController@store', 'as' => 'counter.store']);
            Route::get('/edit', ['uses' => 'Admin\CounterController@edit', 'as' => 'counter.edit']);
            Route::post('/update{id}', ['uses' => 'Admin\CounterController@update', 'as' => 'counter.update']);
            Route::get('/delete', ['uses' => 'Admin\CounterController@delete', 'as' => 'counter.delete']);
        });

        Route::prefix('user')->group(function () {
            Route::get('/index', ['uses' => 'Admin\UserController@index', 'as' => 'user.list']);
            Route::get('/create', ['uses' => 'Admin\UserController@create', 'as' => 'user.new']);
            Route::post('/store', ['uses' => 'Admin\UserController@store', 'as' => 'user.store']);
            Route::get('/edit', ['uses' => 'Admin\UserController@edit', 'as' => 'user.edit']);
            // Route::post('/update{id}', ['uses' => 'Admin\UserController@update', 'as' => 'user.update']);
            // Route::get('/delete', ['uses' => 'Admin\UserController@delete', 'as' => 'user.delete']);
        });

        Route::prefix('token')->group(function () {
            Route::get('/list', 'TokenController@tokenList')->name('list');
            Route::get('/complete', 'TokenController@tokenStatusUpdate')->name('status');
            Route::get('/delete', 'TokenController@tokenDelete')->name('delete');
            Route::get('/manual', 'TokenController@manualToken')->name('manual');
            Route::get('/auto', 'TokenController@autoToken')->name('auto');
            Route::post('/store', 'TokenController@storeToken')->name('store');

            });

    });


    Route::middleware(['officer'])->group(function () {
        Route::prefix('token')->group(function () {
            Route::get('/list', 'TokenController@tokenList')->name('token.list');
            Route::get('/complete', 'TokenController@tokenStatusUpdate')->name('token.status');
            Route::get('/manual/call{id}','TokenController@manualCall')->name('call.manual');
            Route::get('/auto/call','TokenController@autoCall')->name('call.auto');
            Route::get('/current/token', 'TokenController@currentList')->name('current.token');

        });
    });


    Route::middleware(['staff'])->group(function () {
        Route::prefix('token')->group(function () {
            Route::get('/auto', 'TokenController@autoToken')->name('token.auto');
            Route::post('/store', 'TokenController@storeToken')->name('token.store');
        });
    });

    Route::get('/token/current/list', 'TokenController@currentList')->name('current.list');
    Route::get('/display','Admin\DisplayController@index')->name('token.display');
});

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
