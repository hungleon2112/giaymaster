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
        $status->name = "Đơn hàng mới";
        $status->tran_type_id = 1;
        $status->color = "Grey";
        $status->save();

        $status = new Status();
        $status->name = "Xác nhận còn hàng";
        $status->tran_type_id = 1;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Chừa hàng";
        $status->tran_type_id = 1;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Đã chuyển khoản";
        $status->tran_type_id = 1;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Đã gói hàng chờ chuyển";
        $status->tran_type_id = 1;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Đã chuyển hàng";
        $status->tran_type_id = 1;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Đã nhận hàng";
        $status->tran_type_id = 1;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Báo hết hàng";
        $status->tran_type_id = 1;
        $status->color = "Green";
        $status->save();

        $status = new Status();
        $status->name = "Khách hủy đơn";
        $status->tran_type_id = 1;
        $status->color = "Green";
        $status->save();

        $status = new Status();
        $status->name = "Khách trả hàng";
        $status->tran_type_id = 1;
        $status->color = "Green";
        $status->save();

        //COD

        $status = new Status();
        $status->name = "Đơn hàng mới";
        $status->tran_type_id = 2;
        $status->color = "Grey";
        $status->save();

        $status = new Status();
        $status->name = "Xác nhận còn hàng";
        $status->tran_type_id = 2;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Chừa hàng";
        $status->tran_type_id = 2;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Đã gói hàng chờ chuyển";
        $status->tran_type_id = 2;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Đã chuyển hàng";
        $status->tran_type_id = 2;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Đã nhận hàng và thanh toán";
        $status->tran_type_id = 2;
        $status->color = "Red";
        $status->save();

        $status = new Status();
        $status->name = "Báo hết hàng";
        $status->tran_type_id = 2;
        $status->color = "Green";
        $status->save();

        $status = new Status();
        $status->name = "Khách hủy đơn";
        $status->tran_type_id = 2;
        $status->color = "Green";
        $status->save();

        $status = new Status();
        $status->name = "Khách trả hàng";
        $status->tran_type_id = 2;
        $status->color = "Green";
        $status->save();

    }
} 