<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderAddCouponIdTotalFinalColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->integer('coupon_code')->nullable(0);
            $table->decimal('total_final',12,0);
            DB::statement('ALTER TABLE orders MODIFY COLUMN total decimal(12,0)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }

}
