<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Notification extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notifications';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    public function Notification_Admin()
    {
        return $this->hasMany('Notification_Admin', 'notification_id', 'id');
    }



    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
