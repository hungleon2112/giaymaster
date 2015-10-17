<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Users extends BaseModel {



	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
    public $timestamps = true;
    protected $softDelete = true;


    public static $rules_create = array();

    public static $rules_update = array();

    public static $rules_delete = array();

    public function Order()
    {
        return $this->hasMany('Order', 'user_id', 'id');
    }

    public function Product_Comment_User()
    {
        return $this->hasMany('Product_Comment_User', 'user_id', 'id');
    }

    public function CheckRecordExist($column_name, $value)
    {
        $query = static::where($column_name, '=', $value);
        $result = $query->get();
        return $result;
    }

    public function FindUser($id){
        $query = static::where('id', '=', $id);
        $result = $query->get();
        return $result;
    }

    public function Login($username, $password)
    {
        $query = static::where('username', '=', $username)->where('password', '=', $password);
        $result = $query->get();
        return $result;
    }

    public function GetAllUser($pagination)
    {
        $results = DB::table('users')
            ->leftJoin('roles', 'users.role_id', '=', 'roles.id')

            ->select('users.id as Id','users.name as Name', 'users.email as Email', 'users.username as Username', 'users.phone as Phone', 'users.address as Address', 'roles.name as Role' )

            ->paginate($pagination);

        return $results;
    }

    public function GetAllOrderBeginner($user_id){
        $results = DB::table('orders')

            ->select('orders.id as Id')

            ->where('user_id', '=' , $user_id)

            ->get();

        return $results;
    }

    public function GetAllOrderOfficial($user_id, $month, $year){
        $results = DB::table('orders')

            ->select('orders.id as Id')

            ->where('user_id', '=' , $user_id)
            ->where( DB::raw('MONTH(orders.date)'), '=', $month )
            ->where( DB::raw('YEAR(orders.date)'), '=', $year )
            ->get();

        return $results;
    }

    public function SumOrderDetailTotalBeginner($order_id, $branch_id){
        if($branch_id != 0)
        {
            $results = DB::table('order_details')
                ->leftJoin('products', 'order_details.product_id', '=', 'products.id')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('branchs', 'categories.branch_id', '=', 'branchs.id')

                ->select(DB::raw('sum(order_details.total) as total'))

                ->where('order_details.order_id', '=' , $order_id)

                ->where('branchs.id', '=' , $branch_id)

                ->get();

            return $results;
        }
        else
        {
            $results = DB::table('order_details')
                ->leftJoin('products', 'order_details.product_id', '=', 'products.id')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('branchs', 'categories.branch_id', '=', 'branchs.id')

                ->select(DB::raw('sum(order_details.total) as total'))

                ->where('order_details.order_id', '=' , $order_id)

                ->get();

            return $results;
        }
    }

    public function SumOrderDetailTotalOfficial($order_id, $branch_id){
        if($branch_id != 0)
        {
            $results = DB::table('order_details')
                ->leftJoin('products', 'order_details.product_id', '=', 'products.id')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('branchs', 'categories.branch_id', '=', 'branchs.id')

                ->select(DB::raw('sum(order_details.total) as total'))

                ->where('order_details.order_id', '=' , $order_id)

                ->where('branchs.id', '=' , $branch_id)

                ->get();

            return $results;
        }
        else
        {
            $results = DB::table('order_details')
                ->leftJoin('products', 'order_details.product_id', '=', 'products.id')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('branchs', 'categories.branch_id', '=', 'branchs.id')

                ->select(DB::raw('sum(order_details.total) as total'))

                ->where('order_details.order_id', '=' , $order_id)

                ->get();

            return $results;
        }
    }

    public function GetAllAgentBeginner($pagination)
    {
        $results = DB::table('users')
            ->leftJoin('roles', 'users.role_id', '=', 'roles.id')

            ->select('users.id as Id',
                'users.name as Name',
                'users.email as Email',
                'users.username as Username',
                'users.phone as Phone',
                'users.address as Address',
                'roles.name as Role')

            ->where('users.role_id', '=' , '2')

            ->paginate($pagination);

        return $results;
    }

    public function GetAllAgentOfficial($pagination)
    {
        $results = DB::table('users')
            ->leftJoin('roles', 'users.role_id', '=', 'roles.id')

            ->select('users.id as Id','users.name as Name', 'users.email as Email', 'users.username as Username', 'users.phone as Phone', 'users.address as Address', 'roles.name as Role' )

            ->where('users.role_id', '=' , '5')

            ->paginate($pagination);

        return $results;
    }

    /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


}
