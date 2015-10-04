<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 10/2/2015
 * Time: 5:27 PM
 */

class TranTypeTableSeeder {
    public function run() {
        DB::table('tran_type')->truncate();

        $status = new Status();
        $status->name = "Chuyển khoản và nhận hàng";
        $status->save();

        $status = new Status();
        $status->name = "Nhận hàng và trả tiền cho bên chuyển hàng";
        $status->save();

    }
} 