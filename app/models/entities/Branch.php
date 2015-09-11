<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Branch extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'branchs';
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
    public function Category()
    {
        return $this->hasMany('Category', 'branch_id', 'id');
    }

    public function GetAllBranch()
    {
        return Branch::all();
    }
}
