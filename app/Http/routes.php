<?php

Route::group(['middleware' => ['auth']], function () {
    require __DIR__ . '/Routes/front.php';
});
require __DIR__ . '/Routes/auth.php';
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home'])->middleware(['NoHome']);
Route::get('registrados',['as' => 'isFinish',function(){
    return view('isFinish');
}]);
Route::get('usuarios',['as' => 'users','uses'=>'ReportController@users']);
Route::get('usuario/{id}',['as' => 'user','uses'=>'ReportController@user']);



