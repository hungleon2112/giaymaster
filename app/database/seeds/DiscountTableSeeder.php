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
        $discount->percentage = 50;
        $discount->name = "official";
        $discount->rate = 6000000;
        $discount->save();

        $discount = new Discount();
        $discount->percentage = 20;
        $discount->name = "beginner";
        $discount->rate = 3000000;
        $discount->save();

    }
}