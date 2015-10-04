<?php

class OrderController extends \BaseController {

	protected $order;
    protected $order_detail;

    public function __construct(Order $order, Order_Detail $order_detail){
        $this->order = $order;
        $this->order_detail = $order_detail;
    }

    public function ListOrder(){
        $list_order = $this->order->Order_List_All((Session::get('pagination_order')) != '' ? Session::get('pagination_user') : 30);

        for($i = 0 ; $i < count($list_order) ; $i++)
        {
            $list_order_detail = $this->order_detail->Order_Detail_List($list_order[$i]->OrderId);
            $d = date_create($list_order[$i]->OrderDate);
            $list_order[$i]->OrderDate =  date_format($d, 'd/m/Y H:i:s');
            $list_order[$i]->Order_Detail = $list_order_detail;
            $list_order[$i]->Total = 0;
            for($j = 0 ; $j < count($list_order_detail) ; $j ++)
            {
                $list_order[$i]->Total += $list_order_detail[$j]->OrderDetailTotal;
            }
        }

        return View::make('admin.order.list')
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
}
