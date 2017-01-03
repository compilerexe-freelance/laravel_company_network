<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyNetwork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->timestamps();
        });

//        Schema::create('users', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('username')->unique();
//            $table->string('password');
//            $table->rememberToken();
//            $table->timestamps();
//        });

        Schema::create('administrator', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('main_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('main_category_name');
            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_category_id')->unsigned();
            $table->string('category_name');
            $table->tinyInteger('filter_category');
            $table->timestamps();
        });

        Schema::create('sub_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('sub_category_name');
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_category_id')->unsigned();
            $table->string('product_name');
            $table->longText('product_detail')->nullable();
            $table->string('product_picture')->nullable();
            $table->integer('general_price')->nullable();
            $table->integer('special_price')->nullable();
            $table->timestamps();
        });

        Schema::create('custom_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('product_name');
            $table->longText('product_detail')->nullable();
            $table->string('product_picture')->nullable();
            $table->integer('general_price')->nullable();
            $table->integer('special_price')->nullable();
            $table->timestamps();
        });

        Schema::create('promote', function (Blueprint $table) {
            $table->increments('id');
            $table->string('promote_title');
            $table->longText('promote_detail');
            $table->timestamps();
        });

        Schema::create('create_quotation', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('quotation_product_id');
            $table->string('company_name');
            $table->string('address');
            $table->string('full_name');
            $table->string('email');
            $table->string('tel');
            $table->timestamps();
        });

        Schema::create('quotation_product', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('create_quotation_id');
            $table->integer('product_id')->unsigned();
            $table->string('array_custom_product');
            $table->timestamps();
        });

        Schema::create('how_to_buy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('how_to_buy_detail');
            $table->timestamps();
        });

        Schema::create('quotation_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->timestamps();
        });

        Schema::create('about', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('about_detail');
            $table->timestamps();
        });

        Schema::create('contact', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('contact_detail');
            $table->longText('contact_map');
            $table->timestamps();
        });

        Schema::create('information_index', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('information_detail');
            $table->timestamps();
        });

        Schema::create('report_website_visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->ipAddress('ip_address');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banner');
//        Schema::drop('users');
        Schema::drop('administrator');
        Schema::drop('main_category');
        Schema::drop('category');
        Schema::drop('sub_category');
        Schema::drop('product');
        Schema::drop('custom_product');
        Schema::drop('promote');
        Schema::drop('create_quotation');
        Schema::drop('quotation_product');
        Schema::drop('how_to_buy');
        Schema::drop('quotation_uploads');
        Schema::drop('about');
        Schema::drop('contact');
        Schema::drop('information_index');
        Schema::drop('report_website_visitors');
    }
}
