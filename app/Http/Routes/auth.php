<?php
Route::get('login', [
        'uses' => 'Auth\AuthController@getLogin',
        'as' => 'login'
    ]
);
Route::post('login', [
        'uses' => 'Auth\AuthController@postLogin',
        'as' => 'login'
    ]
);

Route::get('logout', [
        'uses' => 'Auth\AuthController@getLogout',
        'as' => 'logout'
    ]
);

Route::get('registro', [
        'uses' => 'Auth\AuthController@getRegister',
        'as' => 'register'
    ]
);
Route::post('registro', [
        'uses' => 'Auth\AuthController@postRegister',
        'as' => 'register'
    ]
);
// Password reset link request routes...

Route::post('registro', [
        'uses' => 'Auth\AuthController@postRegister',
        'as' => 'register'
    ]
);

Route::get('password/email', [
        'uses' => 'Auth\PasswordController@getEmail',
        'as' => 'passwordEmail'
    ]
);
Route::post('password/email', [
    'uses' => 'Auth\PasswordController@postEmail',
    'as' => 'passwordEmailPost'
]);

// Password reset routes...
Route::get('password/reset/{token}', [
    'uses' => 'Auth\PasswordController@getReset',
    'as' => 'passwordReset'
]);
Route::post('password/reset', [
    'uses' => 'Auth\PasswordController@postReset',
    'as' => 'passwordResetPost'
]);
