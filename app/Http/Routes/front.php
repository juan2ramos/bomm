<?php
Route::get('dashboard', [
    'uses' => 'GroupController@stepOne',
    'as' => 'dashboard'
]);
Route::post('uploadPdfArtist', [
    'uses' => 'GroupController@uploadPdfArtist',
    'as' => 'uploadPdfArtist'
]);
Route::post('stepOne', [
    'uses' => 'GroupController@stepOne',
    'as' => 'stepOne'
]);
Route::get('datos_representante', [
    'uses' => 'GroupController@stepTwo',
    'as' => 'stepTwo'
]);
Route::get('grabaciones', [
    'uses' => 'GroupController@stepThree',
    'as' => 'stepThree'
]);
Route::get('terminos', [
    'uses' => 'GroupController@stepFour',
    'as' => 'stepFour'
]);