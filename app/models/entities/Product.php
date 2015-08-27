<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Product extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'products';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    public function Order_Detail()
    {
        return $this->hasMany('Order_Detail', 'product_id', 'id');
    }

    public function Product_Comment_User()
    {
        return $this->hasMany('Product_Comment_User', 'product_id', 'id');
    }

    public function Images()
    {
        return $this->hasMany('Image', 'product_id', 'id');
    }

    public function Optional_Product()
    {
        return $this->hasMany('Optional_Product', 'product_id', 'id');
    }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
