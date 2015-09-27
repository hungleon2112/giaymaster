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

    public static function registerEvents(){
        static::deleting(function($product){
            $product->images()->delete();
        });
    }

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
        return $this->hasMany('Images', 'product_id', 'id');
    }

    public function Optional_Product()
    {
        return $this->hasMany('Optional_Product', 'product_id', 'id');
    }

    public function Brand()
    {
        return $this->belongsTo('Brand','brand_id');
    }

    public function ListProduct($pagination)
    {
        $results = DB::table('products')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('branchs', 'categories.branch_id', '=', 'branchs.id')
            ->select('products.*', 'brands.name as brand', 'categories.name as category', 'branchs.name as branch')
            ->paginate($pagination);
        return $results;
    }

    public function GetProductByBrand($brand, $pagination){
        $results = DB::table('products')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('branchs', 'categories.branch_id', '=', 'branchs.id')
            ->select('products.*', 'brands.name as brand', 'categories.name as category', 'branchs.name as branch')

            ->where('products.brand_id','=',$brand)
            ->paginate($pagination);

        return $results;
    }

    public function GetProductByCategoryGender($category, $gender, $pagination){
      if ($gender == 'male'){
        $gender = 'Nam';
      }
      if ($gender == 'female'){
        $gender = 'Nữ';
      }
      $results = DB::table('products')
        ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->leftJoin('branchs', 'categories.branch_id', '=', 'branchs.id')
        ->select('products.*', 'brands.name as brand', 'categories.name as category', 'branchs.name as branch')
        ->where('categories.root_category_id','=',$category)
        ->where('products.gender','=',$gender)
        ->paginate($pagination);

      return $results;
    }

    public function FindProduct($product_id)
    {
        $results = DB::table('products')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'brands.name as brand', 'categories.name as category')
            ->where('products.id','=',$product_id)
            ->get();
        return $results;
    }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
