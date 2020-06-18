<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_category', function (Blueprint $table) {
            $table->increments('sub_category_id');
            $table->string('sub_category_name');
            $table->text('sub_category_desc');
            $table->integer('sub_category_status');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('tbl_category_product');
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
        Schema::dropIfExists('tbl_sub_category');
    }
}
