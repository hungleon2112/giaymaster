<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 8/27/2015
 * Time: 1:54 PM
 */

class UsersTableSeeder extends Seeder{

    public function run() {
        DB::table('users')->truncate();

        $user = new Users();
        $user->username = "user_1";
        $user->password = "123456";
        $user->name = "Nguyễn Việt Hưng";
        $user->phone = "0933113304";
        $user->email = "viethung.nguyen.2112@gmail.com";
        $user->address = "209/16c Lê Văn Sỹ P.13 Q.3 Tp.HCM";
        $user->save();

        $user = new Users();
        $user->username = "user_2";
        $user->password = "123456";
        $user->name = "user_2";
        $user->phone = "0933113304";
        $user->email = "viethung.nguyen.2112@gmail.com";
        $user->address = "209/16c Lê Văn Sỹ P.13 Q.3 Tp.HCM";
        $user->role_id = 2;
        $user->save();
    }
}