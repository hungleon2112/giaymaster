<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    protected $category;
    protected $branch;
    protected $product;
    protected $image;
    protected $result = array();
    protected $listBrand = array();
    protected $cart = array();
    protected $total;
    protected $total_final;
    protected $coupon_percentage;
    protected $coupon_code;
    protected $brand;
    protected $user_info;
    protected $order;
    protected $order_detail;
    protected $coupon;
    protected $user;
    protected $discount;
    protected $banner;
    protected $banner_list;
    public function __construct(Branch $branch,
                                Category $category,
                                Product $product,
                                Images $image,
                                Brand $brand,
                                Order $order,
                                Order_Detail $order_detail,
                                Coupon $coupon,
                                Users $user,
                                Discount $discount,
                                Banner $banner
                                ){
        $this->branch = $branch;
        $this->category = $category;
        $this->product = $product;
        $this->image = $image;
        $this->brand = $brand;
        $this->order = $order;
        $this->order_detail = $order_detail;
        $this->coupon = $coupon;
        $this->user = $user;
        $this->discount = $discount;
        $this->banner = $banner;
        $this->beforeFilter(function()
        {
            $this->banner_list = $this->banner->GetAllBanner(50);


            $branch_list = $this->branch->GetAllBranch();
            $result = array();
            foreach ($branch_list as $list):
                $result[$list->name] = $this->category->GetAllCatLev1FromBranchID($list->id);
            endforeach;
            $this->result = $result;

            $this->listBrand = $this->brand->GetAllBrand();
            $this->user_info = Session::get('user_info');

            //cart
            $this->cart = Session::get('giay.cart');
            $this->total = 0;
            for($i = 0 ; $i < count($this->cart) ; $i ++)
            {
                $this->total += $this->cart[$i]['total'];
            }

            //coupon
            $this->coupon_percentage = Session::get('giay.coupon');
            if($this->coupon_percentage != '')
            {
                $this->total_final = $this->total - ($this->coupon_percentage * $this->total /100);
            }
            else
            {
                $this->total_final = $this->total;
            }

            //coupon_code
            $this->coupon_code = Session::get('giay.coupon_code');
        });
    }

    public function Index()
    {
      $top_35_prod = Product::take($_ENV['Product_Number_Home'])->orderBy('id', 'desc')->get();
      $product_img = array();
      foreach($top_35_prod as $product):
//        /$img_url = 'uploads/1443109378.jpg';
        $img_url = $this->image->GetFirstImageUrl($product->id);
        $product_img[$product->id] = $img_url;
      endforeach;

      return View::make('home.index')
          ->with('cart',$this->cart)
          ->with('result', $this->result)
          ->with('listBrand', $this->listBrand)
          ->with('user_info', $this->user_info)
          ->with('product_img', $product_img)
          ->with('banner_list', $this->banner_list)
          ;
    }

    public function Blog_Detail()
    {
        return View::make('home.blog_detail')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info)
            ->with('banner_list', $this->banner_list);
    }

    public function Blog_List()
    {
        return View::make('home.blog_list')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info)
            ->with('banner_list', $this->banner_list);
    }

    public function Contact()
    {
        return View::make('home.contact')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info)
            ->with('banner_list', $this->banner_list);
    }

    public function Gallery_List()
    {
        return View::make('home.gallery_list')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info)
            ->with('banner_list', $this->banner_list);
    }

    public function Gallery_Detail()
    {
        return View::make('home.gallery_detail')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info)
            ->with('banner_list', $this->banner_list);
    }

    public function Product_List($category, $gender)
    {
        $list_product = array();

        $list_prod = $this->product->GetProductByCategoryGender($category, $gender, $_ENV['Product_Number_Product_List']);
        //print_r($list_prod); die();
        foreach($list_prod as $product):
            $product_info = array();
            $listImage = $this->image->GetAllImage($product->id);
            foreach($listImage as $i)
            {
                $i['url'] = $_ENV['Domain_Name'].$i['url'];
            }
            array_push($product_info, $listImage, $product);
            array_push($list_product, $product_info);
        endforeach;
        return View::make('home.product_list')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('list_product', $list_product)
            ->with('list_prod', $list_prod)
            ->with('user_info', $this->user_info)
            ->with('banner_list', $this->banner_list);
    }

    public function Product_List_Brand($brand)
    {
        $list_product = array();

        $list_prod = $this->product->GetProductByBrand($brand, $_ENV['Product_Number_Product_List']);

        foreach($list_prod as $product):
            $product_info = array();
            $listImage = $this->image->GetAllImage($product->id);
            foreach($listImage as $i)
            {
                $i['url'] = $_ENV['Domain_Name'].$i['url'];
            }
            array_push($product_info, $listImage, $product);
            array_push($list_product, $product_info);
        endforeach;
        return View::make('home.product_list')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('list_product', $list_product)
            ->with('list_prod', $list_prod)
            ->with('user_info', $this->user_info)
            ->with('banner_list', $this->banner_list);
    }

    public function Product_Detail($product_id)
    {
        $product = $this->product->FindProduct($product_id);
        $product_info = array();
        $listImage = $this->image->GetAllImage($product_id);
        foreach($listImage as $i)
        {
            $i['url'] = $_ENV['Domain_Name'].$i['url'];
        }
        $product_recommend_code_list = explode(",", $product[0]->recommend);
        $product_recommend = $this->product->FindMultipleProduct($product_recommend_code_list);
        //GetImage for Recommend Product
        for($i = 0 ; $i < count($product_recommend) ; $i ++)
        {
            $imageRecUrl = $this->image->GetFirstImageUrl($product_recommend[$i]->id);
            $product_recommend[$i]->image = $_ENV['Domain_Name'].$imageRecUrl;
        }
        array_push($product_info, $listImage, $product, $product_recommend);

        return View::make('home.product_detail')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('product_info', $product_info)
            ->with('add_cart_quantity', $_ENV['Add_Cart_Quantity'])
            ->with('user_info', $this->user_info)
            ->with('banner_list', $this->banner_list);
    }

    public function AddProductToCart(){
        $input = Input::all();

        $item['id'] = UtilityHelper::guid();
        $item['name'] = $input['name'];
        $item['code'] = $input['code'];
        $item['product_id'] = $input['product_id'];
        $item['size'] = $input['size'];
        $item['quantity'] = $input['quantity'];
        $item['price'] = $input['price'];
        $item['total'] = $input['quantity'] * $input['price'];
        $item['image'] = $input['image'];
        $cart = Session::get('giay.cart');

        if ($cart != ''){
            $cart = Session::get('giay.cart');
            $checkExist = false;
            for($i = 0 ; $i < count($cart) ; $i ++)
            {
                if($cart[$i]['product_id'] == $item['product_id'] &&
                   $cart[$i]['size'] == $item['size'])
                {
                    $checkExist =  true;
                    break;

                }
            }
            if($checkExist)
            {
                //Update Quantity & Total
                $cart[$i]['quantity'] += $item['quantity'];
                $cart[$i]['total'] = $cart[$i]['quantity'] * $item['price'];
            }
            else
            {
                array_push($cart,$item);
            }
        }
        else
        {
            $cart = array();
            array_push($cart,$item);
        }

        Session::put('giay.cart', $cart);
        return Response::json(array("cart"=>Session::get('giay.cart')));
    }

    public function ShowCart()
    {

        return View::make('home.cart')
            ->with('cart',$this->cart)
            ->with('total',$this->total)
            ->with('total_final',$this->total_final)
            ->with('coupon_percentage',$this->coupon_percentage)
            ->with('coupon_code', $this->coupon_code)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info)
            ->with('banner_list', $this->banner_list);
    }

    public function DeleteItemCart($id)
    {
        $cart = Session::get('giay.cart');
        for($i = 0 ; $i < count($cart) ; $i ++)
        {
            if($cart[$i]['id'] == $id){
                unset($cart[$i]);
            }
        }
        $cart = array_values($cart);
        Session::put('giay.cart', $cart);

        return Response::json(array("cart"=>Session::get('giay.cart')));
    }

    public function ApproveCart($type_id, $total, $coupon_code, $total_final)
    {
        try {
            $user_info = Session::get('user_info');
            if ($user_info == null) {
                return "Authentication error";
            }

            //Get Total
            $cart = Session::get('giay.cart');
            $total = 0;
            for ($i = 0; $i < count($cart); $i++) {
                $total += $cart[$i]['total'];
            }

            $order['user_id'] = $user_info->id;
            $order['status_id'] = 5;
            $order['date'] = date('Y-m-d H:i:s');
            $order['total'] = $total;
            $order['coupon_code'] = $coupon_code;
            $order['total_final'] = $total_final;
            if($type_id == 1)
            {
                $order['status_id'] = 1;
            }
            else
            {
                $order['status_id'] = 11;
            }

            $order_obj = $this->order->create($order);
            $order_id = $order_obj->id;

            for ($i = 0; $i < count($cart); $i++) {
                $order_detail['order_id'] = $order_id;
                $order_detail['product_id'] = $cart[$i]['product_id'];
                $order_detail['quantity'] = $cart[$i]['quantity'];
                $order_detail['total'] = $cart[$i]['total'];
                $order_detail['status'] = false;
                $order_detail['size'] = $cart[$i]['size'];
                $this->order_detail->create($order_detail);
            }
            Session::forget('giay.cart');
            Session::forget('giay.coupon');
            Session::forget('giay.coupon_code');
            return "Success";
        }
        catch(Exception $ex){
            return "Fail";
        }
    }

    public function SetMonthYearOrder($month, $year)
    {
        Session::put('client_month_order', $month);
        Session::put('client_year_order', $year);

        Session::flash('tab2', 'true');
        return Response::json(array("cart"=>Session::get('year_order_client')));
    }

    public function SetDateFromToOrder($from_date, $to_date)
    {
        Session::put('client_from_date_order', $from_date);
        Session::put('client_to_date_order', $to_date);

        return Response::json(array("cart"=>Session::get('giay.cart')));
    }

    public function ShowOrderList()
    {
        $user_info = Session::get('user_info');

        $from_date = (Session::get('client_from_date_order') != '') ? date("Y-m-d", strtotime(Session::get('client_from_date_order'))) : '';
        $to_date = (Session::get('client_to_date_order') != '') ? date("Y-m-d", strtotime(Session::get('client_to_date_order'))) : '';

        $list_order = $this->order->Order_List($user_info->id, $from_date, $to_date);

        for($i = 0 ; $i < count($list_order) ; $i++)
        {
            $list_order_detail = $this->order_detail->Order_Detail_List($list_order[$i]->OrderId);
            $d = date_create($list_order[$i]->OrderDate);
            $list_order[$i]->OrderDate =  date_format($d, 'd/m/Y H:i:s');
            $list_order[$i]->Order_Detail = $list_order_detail;

            for($j = 0 ; $j < count($list_order_detail); $j ++)
            {
                $list_order_detail[$j]->Image = $_ENV['Domain_Name'].$this->image->GetFirstImageUrl($list_order_detail[$j]->ProductID);
            }

            //Update Status Name
            if($list_order[$i]->Status == 'Đơn hàng mới'){
                $list_order[$i]->Status = 'Đang xử lý';
            }
        }

        $list_user = $this->Discount();
        $list_order_discount_tab = $this->ShowOrderListByMonthYear();

        return View::make('home.order_list')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info)
            ->with('list_order' , $list_order)
            ->with('list_user' , $list_user)
            ->with('list_order_discount_tab' , $list_order_discount_tab)
            ->with('banner_list', $this->banner_list)
            ;
    }

    public function ShowOrderListByMonthYear(){

        $user_id = Session::get('user_info')->id;
        $month = (Session::get('month_order') == '' ? date("n") : Session::get('month_order'));
        $year = (Session::get('year_order') == '' ? date("Y") : Session::get('year_order'));

        $list_order = $this->user->GetAllOrderOfficial($user_id, $month, $year);

        for($i = 0 ; $i < count($list_order) ; $i++)
        {
            $list_order_detail = $this->order_detail->Order_Detail_List($list_order[$i]->Id);
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

        return $list_order;
    }

    public function CheckCoupon($coupon_code)
    {
        $result = $this->coupon->CheckCoupon($coupon_code);
        if(count($result) > 0)
        {
            Session::put('giay.coupon', $result[0]->percentage);
            Session::put('giay.coupon_code', $coupon_code);
        }
        return count($result);
    }

    public function UpdateQuantity($product_id, $order_detail_id, $quantity)
    {
        $cart = Session::get('giay.cart');

        $array_order_detail_id = explode(" ", $order_detail_id);

        $array_quantity = explode(" ", $quantity);

        for($i = 0 ; $i < count($cart) ; $i ++)
        {
            for($j = 0 ; $j < count($array_order_detail_id) ; $j ++){
                if($cart[$i]['id'] == $array_order_detail_id[$j]){
                    $cart[$i]['quantity'] = $array_quantity[$j];
                    $cart[$i]['total'] = $cart[$i]['quantity'] * $cart[$i]['price'];
                }
            }
        }

        Session::put('giay.cart', $cart);

        return Response::json(array("cart"=>Session::get('giay.cart')));
    }

    public function Discount()
    {
        $listUser = new stdClass();
        $listUser->id = Session::get('user_info')->id;

        $month = (Session::get('client_month_order') == '' ? date("n") : Session::get('client_month_order'));
        $year = (Session::get('client_year_order') == '' ? date("Y") : Session::get('client_year_order'));

        $listOrder = $this->user->GetAllOrderOfficial($listUser->id, $month, $year);

        $listOrderDetailGiayDep = 0;
        $listOrderDetailAoQuan = 0;
        $listOrderDetailPhuKien = 0;
        $listOrderDetail = 0;
        $discountGiayDep = 0;
        $discountAoQuan = 0;
        $discountPhuKien = 0;

        for($j = 0 ; $j < count($listOrder) ; $j ++)
        {
            $listOrderDetailGiayDep += $this->user->SumOrderDetailTotalOfficial($listOrder[$j]->Id, 1)[0]->total;
            $listOrderDetailAoQuan += $this->user->SumOrderDetailTotalOfficial($listOrder[$j]->Id, 2)[0]->total;
            $listOrderDetailPhuKien += $this->user->SumOrderDetailTotalOfficial($listOrder[$j]->Id, 3)[0]->total;
            $listOrderDetail += $this->user->SumOrderDetailTotalOfficial($listOrder[$j]->Id, 0)[0]->total;
        }

        $discountGiayDep = (count($this->discount->GetPercentageFromBranchAndRateAndRole(1, $listOrderDetailGiayDep, 5))) > 0 ? $this->discount->GetPercentageFromBranchAndRateAndRole(1, $listOrderDetailGiayDep, 5)[0]->percentage : 0;
        $discountAoQuan = (count($this->discount->GetPercentageFromBranchAndRateAndRole(2, $listOrderDetailAoQuan, 5))) > 0 ? $this->discount->GetPercentageFromBranchAndRateAndRole(2, $listOrderDetailAoQuan, 5)[0]->percentage : 0;
        $discountPhuKien = (count($this->discount->GetPercentageFromBranchAndRateAndRole(3, $listOrderDetailPhuKien, 5))) > 0 ? $this->discount->GetPercentageFromBranchAndRateAndRole(3, $listOrderDetailPhuKien, 5)[0]->percentage : 0;

        $listUser->DiscountGiayDep = $discountGiayDep;
        $listUser->DiscountAoQuan = $discountAoQuan;
        $listUser->DiscountPhuKien = $discountPhuKien;

        $listUser->TotalAoQuan = $listOrderDetailAoQuan;
        $listUser->TotalGiayDep = $listOrderDetailGiayDep;
        $listUser->TotalPhuKien = $listOrderDetailPhuKien;

        $listUser->TotalAoQuanDiscount = $listOrderDetailAoQuan * $discountAoQuan / 100;
        $listUser->TotalGiayDepDiscount = $listOrderDetailGiayDep * $discountGiayDep / 100;
        $listUser->TotalPhuKienDiscount = $listOrderDetailPhuKien * $discountPhuKien / 100;

        $listUser->Total = $listOrderDetail;
        $listUser->TotalDiscount = $listUser->TotalAoQuanDiscount + $listUser->TotalGiayDepDiscount + $listUser->TotalPhuKienDiscount;

        return $listUser;
    }
}
