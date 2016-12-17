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

Route::get('/', 'UserController@getHome');
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

    Route::get('category', 'CategoryController@getCategory')->name('category');
    Route::post('category/insert', 'CategoryController@postCategoryInsert');
    Route::get('category/update/{id}', 'CategoryController@getCategoryUpdate');
    Route::post('category/update/{id}', 'CategoryController@postCategoryUpdate');
    Route::get('category/delete/{id}', 'CategoryController@getCategoryDelete');

    Route::get('sub_category', 'SubCategoryController@getSubCategory')->name('sub_category');
    Route::post('ajax/id_category', 'SubCategoryController@postAjaxIdCategory');
    Route::post('ajax/category', 'SubCategoryController@postAjaxCategory');
    Route::post('sub_category/insert', 'SubCategoryController@postSubCategoryInsert');
    Route::get('sub_category/update/{id}', 'SubCategoryController@getSubCategoryUpdate');
    Route::post('sub_category/update/{id}', 'SubCategoryController@postSubCategoryUpdate');
    Route::get('sub_category/delete/{id}', 'SubCategoryController@getSubCategoryDelete');

    Route::get('product/complete/manage', 'ProductController@getManageCompleteProduct')->name('manage_complete_product');
    Route::get('product/complete/insert', 'ProductController@getCompleteProductInsert');
    Route::post('product/complete/insert', 'ProductController@postCompleteProductInsert');
    Route::get('product/complete/update/{id}', 'ProductController@getCompleteProductUpdate');
    Route::post('product/complete/update/{id}', 'ProductController@postCompleteProductUpdate');
    Route::get('product/complete/delete/{id}', 'ProductController@getCompleteProductDelete');

    Route::get('product/complete/custom/insert', 'ProductController@getCustomProductInsert');
    Route::post('product/complete/custom/insert', 'ProductController@postCustomProductInsert');
    Route::get('product/complete/custom/update/{id}', 'ProductController@getCustomProductUpdate');
    Route::post('product/complete/custom/update/{id}', 'ProductController@postCustomProductUpdate');
    Route::get('product/complete/custom/delete/{id}', 'ProductController@getCustomProductDelete');
  });


});

Route::group(['prefix' => 'product'], function() {
  Route::get('detail', 'ProductController@getProductDetail');
  Route::get('type', 'ProductController@getProductType');
  Route::get('custom', 'ProductController@getProductCustom');
});

Route::group(['prefix' => 'quotation'], function() {
  Route::get('form', 'UserController@getFormQuotation');
  Route::get('create', 'UserController@getGuestQuotation');
  Route::get('member/create', 'UserController@getMemberQuotation');
  Route::get('upload', 'UserController@getFormUploadQuotation');
});
