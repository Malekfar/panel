<?php

Route::group(['prefix'  =>  'panel', 'middleware' => ['web', 'auth', \App\Http\Middleware\CheckPermission::class]], function () {
    Route::get('/', 'App\Http\Controllers\Panel\PanelController@index')->name('panel.dashboard.index');
    Route::get('/menus', 'App\Http\Controllers\Panel\PanelController@menu')->name('panel.menu.index');
    Route::group(['as' => 'panel.'], function () {
        Route::resource('users', 'App\Http\Controllers\Panel\UserController');
    });
    Route::resource('roles', 'App\Http\Controllers\Panel\RoleController');
    Route::get('/managers', 'App\Http\Controllers\Panel\UserController@managers')->name('panel.managers');
    Route::get('users/{user}/permissions', 'App\Http\Controllers\Panel\UserController@permissions')->name('users.permissions');
    Route::post('users/{user}/permissions', 'App\Http\Controllers\Panel\UserController@setPermissions')->name('users.store.permissions');
    Route::post('users/{user}/roles', 'App\Http\Controllers\Panel\UserController@setRoles')->name('users.store.roles');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/panel/login', "App\Http\Controllers\Panel\PanelController@showLoginForm")->name('login');
    Route::post('/panel/login', "App\Http\Controllers\Panel\PanelController@login")->name('dashboard.login');
    Route::get('panel/logout', "App\Http\Controllers\Panel\PanelController@logout")->name('logout');
});


