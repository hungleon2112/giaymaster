<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        //
        Schema::create('order_details', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('order_id');
            $table->integer('product_id');

            $table->integer('quantity');
            $table->integer('total');

            $table->boolean('status',false);
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
        Schema::drop('order_details');
    }

}
