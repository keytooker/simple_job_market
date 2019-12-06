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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@mainpage');
Route::match(['get', 'post'], '/joboffer', 'JobofferController@newoffer')->name('joboffer');
Route::get('/job/{offer_id}', 'JobofferController@getOffer')->where(['offer_id' => '[0-9]+']);
Route::post('/respond/{offer_id}/', 'JobofferController@proccessRespond')->name('respond');//->where(['offer_id' => '[0-9]+']);
Route::get('/account/', 'UserController@account')->name('account');
