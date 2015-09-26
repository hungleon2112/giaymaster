<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Images extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'images';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();


    public function GetAllImage($product_id)
    {
        $query = static::where('product_id', '=', $product_id);
        $results = $query->get();
        return $results;
    }

    public function products()
    {
        return $this->belongsTo('Products')->withTrashed();
    }


    public function GetFirstImageUrl($product_id){
        $query = static::where('product_id', '=', $product_id)->first();
        if (!is_object($query)) {
            return 'front/images/no-image.jpg';
        }
        return $query->url;
    }


    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
