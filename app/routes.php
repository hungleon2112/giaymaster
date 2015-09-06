<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get("/",array('as'=>'home.index','uses'=>'HomeController@Index'));
Route::get("/blog/detail",array('as'=>'home.index','uses'=>'HomeController@Blog_Detail'));
Route::get("/blog/list",array('as'=>'home.index','uses'=>'HomeController@Blog_List'));
Route::get("/contact",array('as'=>'home.index','uses'=>'HomeController@Contact'));
Route::get("/gallery/list",array('as'=>'home.index','uses'=>'HomeController@Gallery_List'));
Route::get("/gallery/detail",array('as'=>'home.index','uses'=>'HomeController@Gallery_Detail'));
Route::get("/product/list",array('as'=>'home.index','uses'=>'HomeController@Product_List'));
Route::get("/product/detail",array('as'=>'home.index','uses'=>'HomeController@Product_Detail'));


Route::get("/admin/dashboard",array('as'=>'admin.dashboard','uses'=>'AdminController@Dashboard'));
Route::get("/admin/product/add",array('as'=>'admin.product.add','uses'=>'ProductController@Add'));

