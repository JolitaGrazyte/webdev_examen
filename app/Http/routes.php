<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


get('/', ['as'=>'home',     'uses' => 'GameController@getAll' ]);


// Password reset
Route::controllers([
    'password' => 'Auth\PasswordController',
]);


// Registration routes...
get('register',             ['as' => 'register',        'uses' => 'Auth\AuthController@getRegister' ]);
post('register',            ['as' => 'post-register',   'uses' => 'Auth\AuthController@postRegister' ]);
get('register/{provider}',  ['as' => 'social-register', 'uses' => 'Auth\AuthController@social_register']);

// Authentication routes...
get('auth/login',       ['as' => 'getLogin',            'uses' => 'Auth\AuthController@getLogin']);
post('auth/login',      ['as' => 'postLogin',           'uses' => 'Auth\AuthController@postLogin']);
get('auth/logout',      ['as' => 'getLogout',           'uses' => 'Auth\AuthController@getLogout']);


// Admin routes...
Route::group(['prefix' => 'admin'], function(){

    resource('periods',         'AdminController' );
    get('periods/{id}/delete',  ['as' => 'period-delete',         'uses'    => 'AdminController@destroy']);

    post('change-email',        ['as' => 'change-email',          'uses'    => 'AdminController@changeEmail']);

});

get('admin',                     ['as' => 'admin',                 'uses'    => 'AdminController@index']);


// Images upload/handle routes...

get('upload/{user_id}',     ['as'=>'getUpload',     'uses' => 'ImagesController@getUpload' ]);
post('upload/{user_id}',    ['as'=>'postUpload',    'uses' => 'ImagesController@postUpload' ]);

get('images',                   ['as'=>'getImages',     'uses'  => 'ImagesController@getImages' ]);
get('image/{filename}/{size}',  ['as'=>'getImage',      'uses'  => 'ImagesController@getImage' ]);
post('images',                  ['as'=>'postVote',      'uses'  => 'GameController@postVotes' ]);
