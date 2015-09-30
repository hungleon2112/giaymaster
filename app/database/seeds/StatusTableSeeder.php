<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 8/27/2015
 * Time: 1:54 PM
 */

class StatusTableSeeder extends Seeder{

    public function run() {
        DB::table('statuses')->truncate();

        $status = new Status();
        $status->name = "Chừa hàng";
        $status->save();

        $status = new Status();
        $status->name = "Đã chuyển khoản";
        $status->save();

        $status = new Status();
        $status->name = "Đang giao hàng";
        $status->save();

        $status = new Status();
        $status->name = "Đã giao hàng";
        $status->save();

        $status = new Status();
        $status->name = "Đang xử lý";
        $status->save();
    }
} 