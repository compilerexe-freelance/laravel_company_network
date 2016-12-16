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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

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
            $table->integer('id_main_category');
            $table->string('category_name');
            $table->timestamps();
        });

        Schema::create('sub_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_category');
            $table->string('sub_category_name');
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_sub_category');
            $table->string('product_name');
            $table->longText('product_detail');
            $table->string('product_picture');
            $table->integer('general_price');
            $table->integer('product_price');
            $table->timestamps();
        });

        Schema::create('custom_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product');
            $table->string('product_name');
            $table->longText('product_detail');
            $table->string('product_picture');
            $table->integer('product_price');
            $table->timestamps();
        });

        Schema::create('promote', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('promote_detail');
            $table->timestamps();
        });

        Schema::create('create_quotation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('address');
            $table->string('full_name');
            $table->string('email');
            $table->string('tel');
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
        Schema::drop('users');
        Schema::drop('administrator');
        Schema::drop('main_category');
        Schema::drop('category');
        Schema::drop('sub_category');
        Schema::drop('product');
        Schema::drop('custom_product');
        Schema::drop('promote');
        Schema::drop('create_quotation');
        Schema::drop('quotation_uploads');
        Schema::drop('about');
        Schema::drop('contact');
    }
}
