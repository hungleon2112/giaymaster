<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateStatusTableAddTranType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('tran_type', function(Blueprint $table){
            $table->integer('tran_type_id')->nullable(1);
            $table->string('color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tran_type', function(Blueprint $table){
            $table->dropColumn('tran_type_id');
            $table->dropColumn('color');
        });
    }

}
