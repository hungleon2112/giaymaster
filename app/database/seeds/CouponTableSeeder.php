<?php
/**
 * Created by PhpStorm.
 * User: vieth
 * Date: 10/5/2015
 * Time: 9:59 PM
 */

class CouponTableSeeder  extends Seeder{

    public function run() {
        DB::table('coupons')->truncate();

        $coupon = new Coupon();
        $coupon->code = "C1";
        $coupon->description = "123456";
        $coupon->from_date = new DateTime('2015-10-01');
        $coupon->to_date = new DateTime('2015-10-20');
        $coupon->percentage = 50;
        $coupon->save();

        $coupon = new Coupon();
        $coupon->code = "C2";
        $coupon->description = "123456";
        $coupon->from_date = new DateTime('2015-10-01');
        $coupon->to_date = new DateTime('2015-10-05');
        $coupon->percentage = 10;
        $coupon->save();
    }
}