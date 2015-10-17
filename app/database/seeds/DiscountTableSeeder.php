<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 8/27/2015
 * Time: 1:54 PM
 */

class DiscountTableSeeder extends Seeder{

    public function run() {
        DB::table('discounts')->truncate();

        $discount = new Discount();
        $discount->role_id = 5; //Đại lý chính thức
        $discount->branch_id = 1; //Giày dép
        $discount->from_rate = 0;
        $discount->to_rate = 3000000;
        $discount->percentage = 5;
        $discount->save();

        $discount = new Discount();
        $discount->role_id = 5; //Đại lý chính thức
        $discount->branch_id = 1; //Giày dép
        $discount->from_rate = 3000001;
        $discount->to_rate = 6000000;
        $discount->percentage = 15;
        $discount->save();

        $discount = new Discount();
        $discount->role_id = 5; //Đại lý chính thức
        $discount->branch_id = 1; //Giày dép
        $discount->from_rate = 6000001;
        $discount->to_rate = 300000000;
        $discount->percentage = 25;
        $discount->save();

    }
}