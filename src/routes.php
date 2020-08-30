<?php
    Route::get('/panel', 'Malekfar\Panel\PanelController@index')->middleware("auth:web")->name('malekfar.panel.dashboard.index');
    Route::get('dashboard/login', "Malekfar\Panel\PanelController@showLoginForm");
    Route::post('dashboard/login', "Malekfar\Panel\PanelController@login")->name('dashboard.login');
