<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Status extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'statuses';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    public function Order()
    {
        return $this->hasMany('Order', 'status_id', 'id');
    }

    public function GetAllStatusByTranType($tran_type_id)
    {
        $results = DB::table('statuses')
            ->select('statuses.*')
            ->where('tran_type_id','=',$tran_type_id)
            ->get();
        return $results;
    }

    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
