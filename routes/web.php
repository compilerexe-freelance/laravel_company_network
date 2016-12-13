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

Route::group(['prefix' => 'admin'], function() {
  Route::get('main', 'AdminController@getMain');

  Route::group(['prefix' => 'manage'], function() {

    Route::get('main_category', 'MainCategoryController@getMainCategory')->name('main_category');
    Route::post('main_category/insert', 'MainCategoryController@postMainCategoryInsert');
    Route::get('main_category/update/{id}', 'MainCategoryController@getMainCategoryUpdate');
    Route::post('main_category/update/{id}', 'MainCategoryController@postMainCategoryUpdate');
    Route::get('main_category/delete/{id}', 'MainCategoryController@getMainCategoryDelete');

    Route::get('category', 'CategoryController@getCategory');
    Route::post('category/insert', 'CategoryController@postCategoryInsert');
    Route::get('category/update/{id}', 'CategoryController@getCategoryUpdate');
    Route::post('category/update/{id}', 'CategoryController@postCategoryUpdate');
    Route::get('category/delete/{id}', 'CategoryController@getCategoryDelete');

    Route::get('sub_category', 'SubCategoryController@getSubCategory');
    Route::post('ajax/id_category', 'SubCategoryController@postAjaxIdCategory');
    Route::post('ajax/category', 'SubCategoryController@postAjaxCategory');
    Route::post('sub_category/insert', 'SubCategoryController@postSubCategoryInsert');
    Route::get('sub_category/update/{id}', 'SubCategoryController@getSubCategoryUpdate');
    Route::post('sub_category/update/{id}', 'SubCategoryController@postSubCategoryUpdate');
    Route::get('sub_category/delete/{id}', 'SubCategoryController@getSubCategoryDelete');

  });


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
