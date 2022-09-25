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
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('image');

            $table->integer('product_category_id')->unsigned();
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');

            $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');

            $table->enum('status', [ 'request_as_new','request_as_edit','active','deactivate','out_of_stock'])->default('request_as_new');

            $table->float('price')->default(0);
            $table->integer('discount')->default(0);
            
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
