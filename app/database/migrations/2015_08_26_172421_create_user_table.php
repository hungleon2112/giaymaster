<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        //
        Schema::create('users', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('username',250);
            $table->string('password',250);
            $table->string('name',250);
            $table->string('phone',250);
            $table->string('email',250);
            $table->string('address',250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('users');
    }

}
