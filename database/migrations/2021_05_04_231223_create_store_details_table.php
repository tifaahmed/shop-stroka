<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->longText('home_slider_sort')->nullable();
            $table->longText('home_column_sort')->nullable();
            
            $table->longText('store_slider_sort')->nullable();
            $table->longText('store_widget_sort')->nullable();
            $table->string('currency')->default('جنية');

            $table->string('lang_id')->default('1');

            $table->timestamps();
        });


        DB::table('store_details')->insert(array('id' => '1', 'lang_id' => '1',));
        // DB::table('infos')->insert(array('id'       => '2', 'lang_id' => '2',));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_details');
    }
}
