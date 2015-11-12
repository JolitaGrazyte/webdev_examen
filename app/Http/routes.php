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

//get('/home', function () {
//    return redirect()->to('/');
//});


// Password reset
Route::controllers([
    'password' => 'Auth\PasswordController',
]);


// Registration routes...
get('register',             ['as' => 'register',        'uses' => 'Auth\AuthController@getRegister' ]);
post('register',            ['as' => 'post-register',   'uses' => 'Auth\AuthController@postRegister' ]);
get('register/{provider}',  ['as' => 'social-register', 'uses' => 'Auth\AuthController@social_register']); // facebook info

// Authentication routes...
get('auth/login',       ['as' => 'getLogin',            'uses' => 'Auth\AuthController@getLogin']);
post('auth/login',      ['as' => 'postLogin',           'uses' => 'Auth\AuthController@postLogin']);
get('auth/logout',      ['as' => 'getLogout',           'uses' => 'Auth\AuthController@getLogout']);


// Admin routes...
Route::group(['prefix' => 'admin'], function(){

    resource('periods',   'PeriodsController' );
    get('periods/{id}/delete',    ['as' => 'period-delete',       'uses' => 'PeriodsController@destroy']);
    get('',                       ['as' => 'admin',       'uses' => 'PeriodsController@index']);

});


// Images upload/handle routes...
get('/', ['as'=>'home',     'uses' => 'GameController@getAll' ]);
get('upload/{user_id}',     ['as'=>'getUpload',     'uses' => 'ImagesController@getUpload' ]);
post('upload/{user_id}',    ['as'=>'postUpload',    'uses' => 'ImagesController@postUpload' ]);

get('images',                   ['as'=>'getImages',     'uses' => 'ImagesController@getImages' ]);
get('image/{filename}/{size}',  ['as'=>'getImage',     'uses' => 'ImagesController@getImage' ]);
post('images',                  ['as'=>'postVote',     'uses' => 'GameController@postVotes' ]);
