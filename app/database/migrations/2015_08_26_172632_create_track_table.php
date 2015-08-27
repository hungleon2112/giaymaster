<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        //
        Schema::create('tracks', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('admin_id');

            $table->string('content',2000);
            $table->dateTime('date');

            $table->integer('order_id');

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
        Schema::drop('tracks');
    }

}
