<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file')->nullable();
            $table->string('poster')->nullable();
            
            $table->boolean('sound')->default('1');
            $table->boolean('loop')->default('1');
            $table->boolean('autoplay')->default('1');
            $table->boolean('controls')->default('1');
 
            $table->timestamps();

        });
        DB::table('videos')->insert(
            array(
                'id'   => '1',
              )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
