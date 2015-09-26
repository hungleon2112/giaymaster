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
Route::get("/product/list/{gender}/{category}",array('as'=>'category.show','uses'=>'HomeController@Product_List'));
Route::get("/product/detail/{id}",array('as'=>'home.index','uses'=>'HomeController@Product_Detail'));


Route::get("/admin/dashboard",array('as'=>'admin.dashboard','uses'=>'AdminController@Dashboard'));

Route::get("/admin/product/add",array('as'=>'admin.product.add','uses'=>'ProductController@Add'));
Route::post("/admin/product/postAdd",array('as'=>'admin.product.add','uses'=>'ProductController@PostAdd'));
Route::post("/admin/product/uploadImage",array('as'=>'admin.product.add','uses'=>'ProductController@UploadImage'));
Route::get("/admin/product/add/getAllCatLev1FromBranchID",array('as'=>'admin.product.add','uses'=>'ProductController@GetAllCatLev1FromBranchID'));
Route::get("/admin/product/add/getAllCatFromParentID",array('as'=>'admin.product.add','uses'=>'ProductController@GetAllCatFromParentID'));
Route::get("/admin/product/getAllImage",array('as'=>'admin.product.add','uses'=>'ProductController@GetAllImage'));
Route::get("/admin/product/deleteImage",array('as'=>'admin.product.add','uses'=>'ProductController@DeleteImage'));

Route::get("/admin/product/list",array('as'=>'admin.product.list','uses'=>'ProductController@ListProduct'));
Route::get("/admin/product/list/:id",array('as'=>'admin.product.list','uses'=>'ProductController@ListProduct'));

Route::get("/admin/product/edit",array('as'=>'admin.product.edit','uses'=>'ProductController@Edit'));
Route::get("/admin/product/showing",array('as'=>'admin.product.showing','uses'=>'ProductController@SetPagination'));
Route::post("/admin/product/optionalInsert",array('as'=>'admin.product.optional','uses'=>'OptionalProductController@OptionalInsert'));
Route::post("/admin/product/optionalDelete",array('as'=>'admin.product.optional','uses'=>'OptionalProductController@OptionalDelete'));

Route::post("/admin/product/updateListProduct",array('as'=>'admin.product.update','uses'=>'ProductController@UpdateListProduct'));
Route::post("/admin/product/deleteListProduct",array('as'=>'admin.product.delete','uses'=>'ProductController@DeleteListProduct'));