<?php

Route::get('dashboard', [
    'uses' => 'HomeController@dashboard',
    'as' => 'dashboard'
]);