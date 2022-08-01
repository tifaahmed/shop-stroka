<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_categories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('product_category_id')->nullable()->unsigned();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');

            $table->string('title');

            $table->string('image')->nullable();

            $table->string('page_url')->nullable();
            $table->string('page_tab_title')->nullable();
            $table->string('page_title')->nullable();
            $table->string('page_description')->nullable();
            $table->string('page_keywords')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sub_categories');
    }
};
