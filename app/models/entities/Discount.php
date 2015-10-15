<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Discount extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'discounts';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


    public function GetAllDiscount($pagination)
    {
        $results = DB::table('discounts')
            ->leftjoin('roles', 'discounts.role_id', '=', 'roles.id')
            ->leftjoin('branchs', 'discounts.branch_id', '=', 'branchs.id')
            ->select(
                'roles.name as Role',
                'branchs.name as Branch',
                'discounts.from_rate as From',
                'discounts.to_rate as To',
                'discounts.percentage as Percentage',
                'discounts.id as id'
            )
            ->get();

        return $results;
    }

}
