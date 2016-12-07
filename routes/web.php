<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('user.home');
});

Route::get('about', 'UserController@getAbout');
Route::get('news', 'UserController@getNews');
Route::get('news/read', 'UserController@getReadNews');
Route::get('contact', 'UserController@getContact');

Route::group(['prefix' => 'user'], function() {
  Route::get('login', 'UserController@getFormLogin');
});

Route::group(['prefix' => 'product'], function() {
  Route::get('detail', 'UserController@getProductDetail');
  Route::get('type', 'UserController@getProductType');
  Route::get('custom', 'UserController@getProductCustom');
});

Route::group(['prefix' => 'quotation'], function() {
  Route::get('form', 'UserController@getFormQuotation');
  Route::get('create', 'UserController@getGuestQuotation');
  Route::get('member/create', 'UserController@getMemberQuotation');
  Route::get('upload', 'UserController@getFormUploadQuotation');
});
