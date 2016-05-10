<?php

Route::group(['middleware' => ['auth']], function () {
    require __DIR__ . '/Routes/front.php';
});
require __DIR__ . '/Routes/auth.php';
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home'])->middleware(['NoHome']);


