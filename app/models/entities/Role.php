<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Role extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    public function Users()
    {
        return $this->hasMany('Users', 'role_id', 'id');
    }

    public function GetAllRole()
    {
        return Role::all();
    }

    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
