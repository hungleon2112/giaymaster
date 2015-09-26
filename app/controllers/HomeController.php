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
    public function __construct(Branch $branch,
                                Category $category,
                                Product $product,
                                Images $image
                                ){
        $this->branch = $branch;
        $this->category = $category;
        $this->product = $product;
        $this->image = $image;
        $this->beforeFilter(function()
        {
            $branch_list = $this->branch->GetAllBranch();
            $result = array();
            foreach ($branch_list as $list):
                $result[$list->name] = $this->category->GetAllCatLev1FromBranchID($list->id);
            endforeach;
            $this->result = $result;
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
      return View::make('home.index')->with('result', $this->result)->with('product_img', $product_img);
    }

    public function Blog_Detail()
    {
        return View::make('home.blog_detail')->with('result', $this->result);
    }

    public function Blog_List()
    {
        return View::make('home.blog_list')->with('result', $this->result);
    }

    public function Contact()
    {
        return View::make('home.contact')->with('result', $this->result);
    }

    public function Gallery_List()
    {
        return View::make('home.gallery_list')->with('result', $this->result);
    }

    public function Gallery_Detail()
    {
        return View::make('home.gallery_detail')->with('result', $this->result);
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
            ->with('result', $this->result)
            ->with('list_product', $list_product)
            ->with('list_prod', $list_prod);
    }

    public function Product_Detail()
    {
        return View::make('home.product_detail')->with('result', $this->result);
    }
}
