<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('desktopimage'); // translatable
            $table->text('mobile_image');// translatable

            $table->text('title1')->nullable();// translatable
            $table->text('subject1')->nullable();// translatable
 
            $table->text('button1')->nullable();// translatable
            $table->text('url1')->nullable();// translatable

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
        Schema::dropIfExists('sliders');
    }
}
