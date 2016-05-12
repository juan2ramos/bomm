<?php
Route::get('dashboard', [
    'uses' => 'GroupController@stepOne',
    'as' => 'dashboard'
]);
Route::post('dashboard', [
    'uses' => 'GroupController@stepOnePost',
    'as' => 'stepOne'
]);

Route::get('datos_representante', [
    'uses' => 'GroupController@stepTwo',
    'as' => 'stepTwo'
])->middleware('step:1');
Route::post('datos_representante', [
    'uses' => 'GroupController@stepTwoPost',
    'as' => 'stepTwoPost'
])->middleware('step:1');


Route::get('grabaciones', [
    'uses' => 'GroupController@stepThree',
    'as' => 'stepThree'
])->middleware('step:2');
Route::post('grabaciones', [
    'uses' => 'GroupController@stepThreePost',
    'as' => 'stepThreePost'
])->middleware('step:2');


Route::get('terminos', [
    'uses' => 'GroupController@stepFour',
    'as' => 'stepFour'
])->middleware('step:3');
Route::post('terminos', [
    'uses' => 'GroupController@stepFourPost',
    'as' => 'stepFourPost'
])->middleware('step:3');


Route::get('paso_final', [
    'uses' => 'GroupController@stepsFinish',
    'as' => 'stepsFinish'
])->middleware('step:4');



Route::post('uploadPdfArtist', [
    'uses' => 'GroupController@uploadPdfArtist',
    'as' => 'uploadPdfArtist'
]);