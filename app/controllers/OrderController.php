<?php

class OrderController extends \BaseController {

	protected $order;
    protected $order_detail;
    protected $status;

    public function __construct(Order $order, Order_Detail $order_detail, Status $status){
        $this->order = $order;
        $this->order_detail = $order_detail;
        $this->status = $status;
    }

    public function ListOrder(){
        $list_order = $this->order->Order_List_All((Session::get('pagination_order')) != '' ? Session::get('pagination_user') : 30);

        for($i = 0 ; $i < count($list_order) ; $i++)
        {
            $list_order_detail = $this->order_detail->Order_Detail_List($list_order[$i]->OrderId);
            $d = date_create($list_order[$i]->OrderDate);
            $list_order[$i]->OrderDate =  date_format($d, 'd/m/Y H:i:s');

            $d = date_create($list_order[$i]->CouponFromDate);
            $list_order[$i]->CouponFromDate =  date_format($d, 'd/m/Y');

            $d = date_create($list_order[$i]->CouponToDate);
            $list_order[$i]->CouponToDate =  date_format($d, 'd/m/Y');

            $list_order[$i]->Order_Detail = $list_order_detail;
            //$list_order[$i]->Total = 0;
            for($j = 0 ; $j < count($list_order_detail) ; $j ++)
            {
                //$list_order[$i]->Total += $list_order_detail[$j]->OrderDetailTotal;
            }

            //UtilityHelper::test($this->status->GetAllStatusByTranType($list_order[$i]->TranTypeId));
        }

        return View::make('admin.order.list')
            ->with('list_order' , $list_order);
    }

    public function SetDateFromToBeginner($from_date, $to_date)
    {
        Session::put('from_date_order_beginner', $from_date);
        Session::put('to_date_order_beginner', $to_date);

        return Response::json(array("cart"=>Session::get('giay.cart')));
    }

    public function SetDateFromToOfficial($from_date, $to_date)
    {
        Session::put('from_date_order_official', $from_date);
        Session::put('to_date_order_official', $to_date);

        return Response::json(array("cart"=>Session::get('giay.cart')));
    }

    public function SetMonthYear($month, $year)
    {
        Session::put('month_order', $month);
        Session::put('year_order', $year);

        return Response::json(array("cart"=>Session::get('giay.cart')));
    }

    public function ListOrderBeginner($user_id){

        $from_date = date("Y-m-d", strtotime(Session::get('from_date_order_beginner')));
        $to_date = date("Y-m-d", strtotime(Session::get('to_date_order_beginner'))). ' 23:59:59';

        $list_order = $this->order->Order_List_All_By_User((Session::get('pagination_order')) != '' ? Session::get('pagination_user') : 30, $user_id, $from_date, $to_date);

        for($i = 0 ; $i < count($list_order) ; $i++)
        {
            $list_order_detail = $this->order_detail->Order_Detail_List($list_order[$i]->OrderId);
            $d = date_create($list_order[$i]->OrderDate);
            $list_order[$i]->OrderDate =  date_format($d, 'd/m/Y H:i:s');

            $d = date_create($list_order[$i]->CouponFromDate);
            $list_order[$i]->CouponFromDate =  date_format($d, 'd/m/Y');

            $d = date_create($list_order[$i]->CouponToDate);
            $list_order[$i]->CouponToDate =  date_format($d, 'd/m/Y');

            $list_order[$i]->Order_Detail = $list_order_detail;
            //$list_order[$i]->Total = 0;
            for($j = 0 ; $j < count($list_order_detail) ; $j ++)
            {
                //$list_order[$i]->Total += $list_order_detail[$j]->OrderDetailTotal;
            }

            //UtilityHelper::test($this->status->GetAllStatusByTranType($list_order[$i]->TranTypeId));
        }

        return View::make('admin.agent.beginner.order.list')
            ->with('list_order' , $list_order);
    }

    public function ListOrderOfficial($user_id){

        $from_date = date("Y-m-d", strtotime(Session::get('from_date_order_official')));
        $to_date = date("Y-m-d", strtotime(Session::get('to_date_order_official'))). ' 23:59:59';

        $list_order = $this->order->Order_List_All_By_User((Session::get('pagination_order')) != '' ? Session::get('pagination_user') : 30, $user_id, $from_date, $to_date);
		
        for($i = 0 ; $i < count($list_order) ; $i++)
        {
            $list_order_detail = $this->order_detail->Order_Detail_List($list_order[$i]->OrderId);
            $d = date_create($list_order[$i]->OrderDate);
            $list_order[$i]->OrderDate =  date_format($d, 'd/m/Y H:i:s');

            $d = date_create($list_order[$i]->CouponFromDate);
            $list_order[$i]->CouponFromDate =  date_format($d, 'd/m/Y');

            $d = date_create($list_order[$i]->CouponToDate);
            $list_order[$i]->CouponToDate =  date_format($d, 'd/m/Y');

            $list_order[$i]->Order_Detail = $list_order_detail;
            //$list_order[$i]->Total = 0;
            for($j = 0 ; $j < count($list_order_detail) ; $j ++)
            {
                //$list_order[$i]->Total += $list_order_detail[$j]->OrderDetailTotal;
            }

            //UtilityHelper::test($this->status->GetAllStatusByTranType($list_order[$i]->TranTypeId));
        }

        return View::make('admin.agent.official.order.list')
            ->with('list_order' , $list_order);
    }

    public function SetPagination()
    {
        try
        {
            $input = Input::all();
            if(isset($input))
            {
                $pagination = $input['showing'];
                Session::put('pagination_order', $pagination);
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function UpdateNoteStorage()
    {
        try
        {
            $input = Input::all();
            if(isset($input))
            {
                $order = Order::find($input['order_id']);
                $order->note = $input['note'];
                $order->storage = $input['storage'];
                $order->ship_fee = $input['ship_fee'];
                $order->status_id = $input['status_id'];
                $order->save();
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function GetAllStatusByTranType($tran_type_id){
        return $this->status->GetAllStatusByTranType($tran_type_id);
    }

    public function UpdateStatus($order_id, $status_id)
    {
        $order = Order::find($order_id);
        $order->status_id = $status_id;
        $order->save();
    }
}
