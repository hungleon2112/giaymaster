<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AdminTableSeeder');
        $this->call('BranchTableSeeder');
        $this->call('BrandTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('DiscountTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('StatusTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('OptionalTableSeeder');
        $this->call('TranTypeTableSeeder');
        $this->call('CouponTableSeeder');
	}

}
