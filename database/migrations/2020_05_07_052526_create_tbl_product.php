<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->text('product_desc');
            $table->text('product_content');
            $table->string('product_price');
            $table->string('product_image');
            $table->integer('product_status');
            $table->string('product_weight');
            $table->string('product_unit');
            $table->string('product_origin');
            $table->string('product_netweight');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('tbl_category_product');
            $table->unsignedInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('sub_category_id')->on('tbl_sub_category');
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
        Schema::dropIfExists('tbl_product');
    }
}
