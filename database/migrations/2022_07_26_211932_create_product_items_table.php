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
        Schema::create('product_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();

            $table->integer('product_sub_category_id')->unsigned();
            $table->foreign('product_sub_category_id')->references('id')->on('product_sub_categories')->onDelete('cascade');


            // $table->integer('code')->default(0);

            $table->integer('visit_count')->default(0);
            $table->integer('order_count')->default(0);
            $table->integer('wishlisted_count')->default(0);
            $table->integer('rating_count')->default(0);
            $table->integer('comment_count')->default(0);

            $table->float('rating')->default(0)->nullable();//rating_persent

            $table->float('price')->default(0);

            $table->string('tag')->nullable();
            $table->string('tag_color')->nullable();//color hex


            $table->boolean('chosen')->default(0);// home show


            $table->string('code')->nullable();


            $table->string('image_one')->nullable();


            $table->string('page_url');


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
        Schema::dropIfExists('product_items');
    }
};
