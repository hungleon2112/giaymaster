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
                'orders.id as OrderId', 'orders.date as OrderDate', 'orders.total as OrderTotal', 'orders.total_final as OrderTotalFinal',
                'orders.ship_fee as ShipFee',
                'statuses.name as Status')
            ->where('orders.user_id','=',$user_id)
            ->orderBy('date','desc')
            ->paginate($_ENV['Order_List']);

        return $results;
    }

    public function Order_List_All($pagination)
    {
        $results = DB::table('orders')
            ->leftjoin('statuses', 'orders.status_id', '=', 'statuses.id')
            ->leftjoin('users', 'orders.user_id', '=', 'users.id')
            ->leftjoin('coupons', 'orders.coupon_code', '=', 'coupons.code')
            ->leftjoin('tran_type', 'statuses.tran_type_id', '=', 'tran_type.id')
            ->select(
                'orders.id as OrderId', 'orders.date as OrderDate', 'orders.total as OrderTotal',
                'orders.coupon_code as CouponCode',
                'orders.total_final as OrderTotalFinal',
                'orders.note as Note',
                'orders.storage as Storage',
                'orders.ship_fee as ShipFee',
                'coupons.id as CouponId',
                'coupons.percentage as CouponPercentage',
                'coupons.from_date as CouponFromDate',
                'coupons.to_date as CouponToDate',
                'statuses.id as StatusId',
                'statuses.name as Status',
                'statuses.color as Color',
                'users.name as Customer',
                'tran_type.name as TranType',
                'tran_type.id as TranTypeId'
                )
            ->orderBy('date','desc')
            ->paginate($pagination);

        return $results;
    }


    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
