<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 10/2/2015
 * Time: 5:27 PM
 */

class TranTypeTableSeeder extends Seeder{

    public function run() {
        DB::table('tran_type')->truncate();

        $tran_type = new Tran_Type();
        $tran_type->name = "Chuyển khoản và nhận hàng";
        $tran_type->save();

        $tran_type = new Tran_Type();
        $tran_type->name = "Nhận hàng và trả tiền cho bên chuyển hàng";
        $tran_type->save();
    }

} 