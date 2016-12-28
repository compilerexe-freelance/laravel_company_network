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
Route::get('verify', 'VerifyAdmin@getVerify')->name('verify');
Route::post('verify_login', 'VerifyAdmin@postVerfiry');

Route::get('/', 'UserController@getHome')->name('home');
Route::get('about', 'UserController@getAbout');
Route::get('news', 'UserController@getNews');
Route::get('news/read', 'UserController@getReadNews');
Route::get('contact', 'UserController@getContact');

Route::group(['prefix' => 'user'], function() {
  Route::get('login', 'UserController@getFormLogin');
});

Route::group(['middleware' => ['VerifyAdmin']], function() {
  Route::group(['prefix' => 'admin'], function() {
    Route::get('main', 'AdminController@getMain')->name('control_panel');
    Route::get('change/password', 'AdminController@getChangePassword');
    Route::post('change/password', 'AdminController@postChangePassword');
    Route::get('logout', 'AdminController@getLogout');

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

      /* Manage Complete Product */
      // Complete Product
      Route::get('product/complete/manage', 'CompleteProductController@getManageCompleteProduct')->name('manage_complete_product');
      Route::get('product/complete/insert', 'CompleteProductController@getCompleteProductInsert');
      Route::post('product/complete/insert', 'CompleteProductController@postCompleteProductInsert');
      Route::get('product/complete/update/{id}', 'CompleteProductController@getCompleteProductUpdate');
      Route::post('product/complete/update/{id}', 'CompleteProductController@postCompleteProductUpdate');
      Route::get('product/complete/delete/{id}', 'CompleteProductController@getCompleteProductDelete');
      // Custom Product
      Route::get('product/complete/custom/insert', 'CompleteProductController@getCustomProductInsert');
      Route::post('product/complete/custom/insert', 'CompleteProductController@postCustomProductInsert');
      Route::get('product/complete/custom/update/{id}', 'CompleteProductController@getCustomProductUpdate');
      Route::post('product/complete/custom/update/{id}', 'CompleteProductController@postCustomProductUpdate');
      Route::get('product/complete/custom/delete/{id}', 'CompleteProductController@getCustomProductDelete');
      /* End Manage Complete Product */

      /* Manage Custom Product */
      Route::get('product/custom/insert', 'CustomProductController@getCustomProductInsert');
      /* End Manage Custom Product */

    }); // End Group Manage

    Route::group(['prefix' => 'change/ui'], function() {
      Route::get('banner', 'ChangeUIController@getBanner');
      Route::post('banner', 'ChangeUIController@postBanner');
    });

  }); // End Group Admin
}); // End Middleware Admin


Route::group(['prefix' => 'product'], function() {
  Route::get('category/{id}', 'UserController@getSubCategoryProduct');
  Route::get('detail', 'UserController@getProductDetail');
  Route::get('type', 'UserController@getProductType');
  Route::any('select', 'UserController@getProductSelect');
  Route::get('complete', 'UserController@getProductComplete');
});

Route::group(['prefix' => 'quotation'], function() {
  Route::any('form/{id}', 'UserController@anyFormQuotation');
  Route::post('create', 'UserController@postGuestQuotation');
  Route::any('print', 'UserController@postPrintQuotation');
  Route::get('member/create', 'UserController@getMemberQuotation');
  Route::get('upload', 'UserController@getFormUploadQuotation');
});
