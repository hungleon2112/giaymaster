<?php
/**
 * Created by PhpStorm.
 * User: vieth
 * Date: 10/5/2015
 * Time: 10:02 PM
 */

class Coupon extends BaseModel {



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    public function CheckCoupon($coupon_code){
        $results = DB::table('coupons')
            ->where('code','=',$coupon_code)
            ->where('from_date','<=',date("Y-m-d"))
            ->where('to_date','>=',date("Y-m-d"))
            ->get();
        return $results;
    }

    public function Coupon_List()
    {
        $results = DB::table('coupons')
            ->paginate($_ENV['Order_List']);

        return $results;
    }

}