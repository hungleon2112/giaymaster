<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Users extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    public function Order()
    {
        return $this->hasMany('Order', 'user_id', 'id');
    }

    public function Product_Comment_User()
    {
        return $this->hasMany('Product_Comment_User', 'user_id', 'id');
    }

    public function CheckRecordExist($column_name, $value)
    {
        $query = static::where($column_name, '=', $value);
        $result = $query->get();
        return $result;
    }

    public function Login($username, $password)
    {
        $query = static::where('username', '=', $username)->where('password', '=', $password);
        $result = $query->get();
        return $result;
    }

    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
