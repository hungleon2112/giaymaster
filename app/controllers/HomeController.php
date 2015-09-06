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

	public function Index()
	{
		return View::make('home.index');
	}

    public function Blog_Detail()
    {
        return View::make('home.blog_detail');
    }

    public function Blog_List()
    {
        return View::make('home.blog_list');
    }

    public function Contact()
    {
        return View::make('home.contact');
    }

    public function Gallery_List()
    {
        return View::make('home.gallery_list');
    }

    public function Gallery_Detail()
    {
        return View::make('home.gallery_detail');
    }

    public function Product_List()
    {
        return View::make('home.product_list');
    }

    public function Product_Detail()
    {
        return View::make('home.product_detail');
    }
}
