<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 8/27/2015
 * Time: 1:54 PM
 */

class BranchTableSeeder extends Seeder{

    public function run() {
        DB::table('branchs')->truncate();

        $branch = new Branch();
        $branch->name = "Giày dép";
        $branch->save();

        $branch = new Branch();
        $branch->name = "Áo quần";
        $branch->save();

        $branch = new Branch();
        $branch->name = "Phụ kiện";
        $branch->save();

    }
} 