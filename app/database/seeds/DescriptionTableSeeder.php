<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 8/27/2015
 * Time: 1:54 PM
 */

class DescriptionTableSeeder extends Seeder{

    public function run() {
        DB::table('website_description')->truncate();

        $des = new Description();
        $des->description = "For nearly a decade, Flight Club has been the most trusted source for buying and selling the
rarest and most coveted sneakers, worldwide. You'll find the deepest and most versatile
selection of kicks here -- from Air Jordan to Nike to adidas to New Balance -- available to ship
worldwide, and ready to buy at both Flight Club shops between New York and Los Angeles.";
        $des->save();

    }
}