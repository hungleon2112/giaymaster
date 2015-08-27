<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 8/27/2015
 * Time: 1:54 PM
 */

class AdminTableSeeder extends Seeder{

    public function run() {
        DB::table('admins')->truncate();

        $admin = new Admin();
        $admin->username = "admin_1";
        $admin->password = "123456";
        $admin->save();

        $admin = new Admin();
        $admin->username = "admin_2";
        $admin->password = "123456";
        $admin->save();
    }
}