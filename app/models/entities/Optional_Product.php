<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Optional_Product extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'optional_product';
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

    public function GetOptionalProductByProductID($optional_id, $product_id){
        $results = DB::table('optional_product')
            ->where('product_id','=',$product_id)
            ->where('optional_id','=',$optional_id)
            ->get();
        return $results;
    }

}
