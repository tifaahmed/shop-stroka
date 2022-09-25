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
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->enum('status', ['pending', 'accepted', 'rejected' ,'canceled'])->default('pending');

            $table->string('image'); // [note: "store logo  pizza"]

            $table->text('title'); // [note: "translatable"]
            $table->text('description'); // [note: "translatable"]

            $table->string('phone'); 

            $table->string('latitude')->nullable() ;
            $table->string('longitude')->nullable();

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
        Schema::dropIfExists('stores');
    }
};
