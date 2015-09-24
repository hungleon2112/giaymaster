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
    protected $result = array();
    public function __construct(Branch $branch,
                                Category $category
                                ){
        $this->branch = $branch;
        $this->category = $category;
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
		return View::make('home.index')->with('result', $this->result);
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

    public function Product_List()
    {
        return View::make('home.product_list')->with('result', $this->result);
    }

    public function Product_Detail()
    {
        return View::make('home.product_detail')->with('result', $this->result);
    }
}
