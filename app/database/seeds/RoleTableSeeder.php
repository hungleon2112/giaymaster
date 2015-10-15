<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 8/27/2015
 * Time: 1:54 PM
 */

class RoleTableSeeder extends Seeder{

    public function run() {
        DB::table('roles')->truncate();

        $role = new Role();
        $role->name = "Khách hàng";
        $role->save();

        $role = new Role();
        $role->name = "Đại lý mới";
        $role->save();

        $role = new Role();
        $role->name = "Nhà phân phối";
        $role->save();

        $role = new Role();
        $role->name = "Admin";
        $role->save();

        $role = new Role();
        $role->name = "Đại lý chính thức";
        $role->save();
    }
}