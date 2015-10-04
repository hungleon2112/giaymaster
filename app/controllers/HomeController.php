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
    protected $brand;
    protected $user_info;
    protected $order;
    protected $order_detail;
    public function __construct(Branch $branch,
                                Category $category,
                                Product $product,
                                Images $image,
                                Brand $brand,
                                Order $order,
                                Order_Detail $order_detail
                                ){
        $this->branch = $branch;
        $this->category = $category;
        $this->product = $product;
        $this->image = $image;
        $this->brand = $brand;
        $this->order = $order;
        $this->order_detail = $order_detail;
        $this->beforeFilter(function()
        {
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
          ->with('product_img', $product_img);
    }

    public function Blog_Detail()
    {
        return View::make('home.blog_detail')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info);
    }

    public function Blog_List()
    {
        return View::make('home.blog_list')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info);
    }

    public function Contact()
    {
        return View::make('home.contact')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info);
    }

    public function Gallery_List()
    {
        return View::make('home.gallery_list')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info);
    }

    public function Gallery_Detail()
    {
        return View::make('home.gallery_detail')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info);
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
            ->with('user_info', $this->user_info);
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
            ->with('user_info', $this->user_info);
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
        array_push($product_info, $listImage, $product);
        return View::make('home.product_detail')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('product_info', $product_info)
            ->with('add_cart_quantity', $_ENV['Add_Cart_Quantity'])
            ->with('user_info', $this->user_info);
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
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info);
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

    public function ApproveCart()
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
            return "Success";
        }
        catch(Exception $ex){
            return "Fail";
        }
    }

    public function ShowOrderList()
    {
        $user_info = Session::get('user_info');

        $list_order = $this->order->Order_List($user_info->id);

        for($i = 0 ; $i < count($list_order) ; $i++)
        {
            $list_order_detail = $this->order_detail->Order_Detail_List($list_order[$i]->OrderId);
            $d = date_create($list_order[$i]->OrderDate);
            $list_order[$i]->OrderDate =  date_format($d, 'd/m/Y H:i:s');
            $list_order[$i]->Order_Detail = $list_order_detail;
        }

        //UtilityHelper::test($list_order);
        return View::make('home.order_list')
            ->with('cart',$this->cart)
            ->with('result', $this->result)
            ->with('listBrand', $this->listBrand)
            ->with('user_info', $this->user_info)
            ->with('list_order' , $list_order);
    }
}
