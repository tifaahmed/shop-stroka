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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');




            $table->enum('gender',['girl','boy'])->default('boy');
            $table->string('phone')->nullable();
            $table->date('birthdate')->nullable();
            
            $table->timestamp('email_verified_at')->nullable();
            $table -> string        ( 'avatar'   ) -> nullable( )              ;


            $table -> integer         ( 'pin_code'  ) -> nullable( ) -> unique( ) ;
            $table -> string         ( 'fcm_token'  ) -> nullable( ) ;

            $table->string('latitude')->nullable() ;
            $table->string('longitude')->nullable();

            $table->string('token', 60)-> nullable( )->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
