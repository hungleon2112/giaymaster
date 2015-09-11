<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Brand extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'brands';
    public $timestamps = true;
    use SoftDeletingTrait;
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    public function Product()
    {
        return $this->hasMany('Product', 'category_id', 'id');
    }

    public function GetAllBrand()
    {
        return Brand::all();
    }

}
