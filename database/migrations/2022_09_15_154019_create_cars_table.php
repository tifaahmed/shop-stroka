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
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

          
            $table->enum('status', ['pending', 'accepted', 'rejected' ,'canceled']);
            $table->string('image')->nullable(); // [note: "car  image"]

            $table->text('title'); // [note: "translatable , car title"]
            $table->text('description'); // [note: "translatable , car description"]

            $table->string('latitude'); 
            $table->string('longitude'); 

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
        Schema::dropIfExists('cars');
    }
};
