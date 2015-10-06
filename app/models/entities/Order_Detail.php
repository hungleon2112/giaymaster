<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Order_Detail extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order_details';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();


    public function Order_Detail_List($order_id)
    {
        $results = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')

            ->select(
                'order_details.quantity as Quantity', 'order_details.total as OrderDetailTotal', 'order_details.size as OrderDetailSize',
                'products.name as ProductName', 'products.code as ProductCode', 'products.price_original as ProductPrice','products.id as ProductID')
            ->where('order_details.order_id','=',$order_id)
            ->get();

        return $results;
    }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
