<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDiscountAddRoleBranch extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('discounts', function(Blueprint $table){
            $table->integer('role_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->decimal('from_rate',12,0)->nullable(0);
            $table->decimal('to_rate',12,0)->nullable(0);
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
	}

}
