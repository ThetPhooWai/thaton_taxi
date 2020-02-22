<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'auth'],function(){
    Route::get('/login',[
        'uses'=>'AuthController@getLogin',
        'as'=>'login'
    ]);
    Route::get('/register',[
        'uses'=>'AuthController@getRegister',
        'as'=>'Register'
    ]);
    Route::post('/register',[
        'uses'=>'AuthController@postRegister',
        'as'=>'register'
    ]);
    Route::post('/logIn',[
        'uses'=>'AuthController@logIn',
        'as'=>'logIn'
    ]);

});
Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){

    Route::get("driver/search",[
        'uses'=>'MotorController@getSearchDriver',
        'as'=>'driver.search'
    ]);

    Route::get("/driver/photo/{p_name}",[
        'uses'=>'MotorController@getDriverPhoto',
        'as'=>'driver.photo'
    ]);

    Route::get("/all/motor",[
        'uses'=>'MotorController@getAllMotor',
        'as'=>'motors.all'
    ]);

    Route::get("/new/motor",[
        'uses'=>'MotorController@getNewMotor',
        'as'=>'motor.new'

    ]);
    Route::post('/new/motor',[
            'uses'=>'MotorController@postNewMotor',
            'as'=>'motor.new'
        ]);

    Route::get('/dashboard',[
        'uses'=>'AdminController@getdashboard',
        'as'=>'dashboard'
    ]);//->middleware('auth);
    Route::get('/logout',[
        'uses'=>'AdminController@getLogout',
        'as'=>'logout'
    ]);
    Route::get('/setting',[
        'uses'=>"AdminController@getSetting",
        'as'=>'setting'
    ]);
    Route::post('/update/password',[
        'uses'=>"AdminController@updatePassword",
        'as'=>'update.password'
    ]);
    Route::get('/quarter/new',[
        'uses'=>'QuarterController@getNewQuarter',
        'as'=>'quarter.new'
    ]);
    Route::post('/quarter/new',[
        'uses'=>'QuarterController@postNewQuarter',
        'as'=>'quarter.new'
    ]);
    Route::get('/quarter/all',[
        'uses'=>'QuarterController@getAllQuarter',
        'as'=>'quarter.all'
    ]);
    Route::post('/quarter/edit',[
        'uses'=>'QuarterController@getEdit',
        'as'=>'edit'
    ]);

    Route::get('/search/road',[
        'uses'=>'RoadController@getSearchRoad',
        'as'=>'search.road'
    ]);
    Route::get('/all/road',[
        'uses'=>'RoadController@getALlRoad',
        'as'=>'road.all'
    ]);
    Route::post('/new/road',[
        'uses'=>'RoadController@postNewRoad',
        'as'=>'road.new'
    ]);
    Route::get('/new/road',[
        'uses'=>'RoadController@getNewRoad',
        'as'=>'road.new'
    ]);








});
