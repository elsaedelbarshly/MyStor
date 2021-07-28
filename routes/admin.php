<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

    Route::get('/login','LoginController@getLoginForm')->name('admin.login');
    Route::post('/login','LoginController@login')->name('admin.login.post');
    Route::get('/logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware'=>['auth:admin']],function(){
        Route::get('/',function(){
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    Route::group(['namespace'=>'Auth'],function(){
        Route::get('/change-password','ChangePasswordController@changePassword')->name('admin.password.change');
        Route::post('update-password','ChangePasswordController@updatePassword')->name('admin.password.update');
    });

    //category route 

    Route::group(['prefix'=>'category','namespace'=>'category'],function(){
        Route::get('/','CategoryController@index')->name('category');
        Route::post('/store','CategoryController@store')->name('store.category');
        Route::get('/edit/{id}','CategoryController@edit')->name('edit.category');
        Route::post('/update/{id}','CategoryController@update')->name('update.category');
        Route::get('/delete/{id}','CategoryController@destroy')->name('delete.category');
    });
    
    
});