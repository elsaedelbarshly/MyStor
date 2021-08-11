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
    
    //brands

    Route::group(['prefix'=>'brand','namespace'=>'category'],function(){
        Route::get('/','BrandController@index')->name('brand');
        Route::post('/store','BrandController@store')->name('store.brand');
        Route::get('/edit/{id}','BrandController@edit')->name('edit.brand');
        Route::post('/update/{id}','BrandController@update')->name('update.brand');
        Route::get('/delete/{id}','BrandController@destory')->name('delete.brand');
    });

    //sup categories

    Route::group(['prefix'=>'sub-category','namespace'=>'category'],function(){
        Route::get('/','SubCategoryController@subCategory')->name('subCategory');
        Route::post('/store','SubCategoryController@store')->name('store.sub-category');
        Route::get('/edit/{id}','SubCategoryController@edit')->name('edit.sub-category');
        Route::post('/update/{id}','SubCategoryController@update')->name('update.sub-category');
        Route::get('/delete/{id}','SubCategoryController@destroy')->name('delete.sub-category');
    });

    //admin coupan
    Route::group(['prefix'=>'coupan','namespace'=>'coupan'],function(){
        Route::get('/','CoupanController@coupan')->name('admin.coupan');
        Route::post('/store','CoupanController@store')->name('store.admin.coupan');
        Route::get('/edit/{id}','CoupanController@edit')->name('edit.admin.coupan');
        Route::post('/update/{id}','CoupanController@update')->name('update.admin.coupan');
        Route::get('/delete/{id}','CoupanController@destroy')->name('delete.admin.coupan');
    });

    Route::group(['prefix'=>'subscriber','namespace'=>'coupan'],function(){
        Route::get('/','CoupanController@newlater')->name('newlater');
        Route::Get('/delete/{id}','CoupanController@destory')->name('delete.newlater');
    });

});