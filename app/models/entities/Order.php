<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Order extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'orders';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    public function Order_Detail()
    {
        return $this->hasMany('Order_Detail', 'order_id', 'id');
    }

    public function Order_List($user_id)
    {
        $results = DB::table('orders')
            ->join('statuses', 'orders.status_id', '=', 'statuses.id')
            ->select(
                'orders.id as OrderId', 'orders.date as OrderDate', 'orders.total as OrderTotal',
                'statuses.name as Status')
            ->where('orders.user_id','=',$user_id)
            ->orderBy('date','desc')
            ->get();

        return $results;
    }


    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
