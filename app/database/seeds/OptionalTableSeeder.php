<?php
/**
 * Created by PhpStorm.
 * User: vieth
 * Date: 9/14/2015
 * Time: 12:00 AM
 */

class OptionalTableSeeder extends Seeder{

    public function run() {
        DB::table('optionals')->truncate();

        $optional = new Optional();
        $optional->name = "New";
        $optional->save();

        $optional = new Optional();
        $optional->name = "Sale";
        $optional->save();


    }
}