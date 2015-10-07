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
Route::get("/blog/detail",array('as'=>'blog.detail','uses'=>'HomeController@Blog_Detail'));
Route::get("/blog/list",array('as'=>'blog.list','uses'=>'HomeController@Blog_List'));
Route::get("/contact",array('as'=>'contact','uses'=>'HomeController@Contact'));
Route::get("/gallery/list",array('as'=>'gallery.list','uses'=>'HomeController@Gallery_List'));
Route::get("/gallery/detail",array('as'=>'gallery.detail','uses'=>'HomeController@Gallery_Detail'));
Route::get("/product/list/{brand}",array('as'=>'product.list.brand','uses'=>'HomeController@Product_List_Brand'));
Route::get("/product/list/{gender}/{category}",array('as'=>'product.list','uses'=>'HomeController@Product_List'));
Route::get("/product/detail/{id}",array('as'=>'product.detail','uses'=>'HomeController@Product_Detail'));
Route::post("/user/login",array('as'=>'user.login','uses'=>'UserController@Login'));
Route::post("/user/edit",array('as'=>'user.edit','uses'=>'UserController@Update'));
Route::get("/user/get",array('as'=>'user.get','uses'=>'UserController@Get'));
Route::get("/user/logout",array('as'=>'user.logout','uses'=>'UserController@Logout'));
Route::post("/user/register",array('as'=>'user.register','uses'=>'UserController@Register'));
Route::get("/user/checkUsername/{username}",array('as'=>'user.check','uses'=>'UserController@CheckUsername'));
Route::get("/user/checkEmail/{email}",array('as'=>'user.check','uses'=>'UserController@CheckEmail'));
Route::get("/cart/add",array('as'=>'cart.add','uses'=>'HomeController@AddProductToCart'));
Route::get("/cart/show",array('as'=>'cart.show','uses'=>'HomeController@ShowCart'));
Route::get("/cart/deleteItem/{id}",array('as'=>'cart.delete.item','uses'=>'HomeController@DeleteItemCart'));
Route::get("/cart/approve/{type_id}/{total}/{coupon_code}/{total_final}",array('as'=>'cart.approve','uses'=>'HomeController@ApproveCart'));
Route::get("/order/show",array('as'=>'order.show','uses'=>'HomeController@ShowOrderList'));
Route::get("/contact",array('as'=>'contact','uses'=>'HomeController@Contact'));
Route::get("/coupon/{coupon_code}",array('as'=>'coupon','uses'=>'HomeController@CheckCoupon'));

Route::get("/admin/dashboard",array('as'=>'admin.dashboard','uses'=>'AdminController@Dashboard'));
Route::get("/admin/product/add",array('as'=>'admin.product.add','uses'=>'ProductController@Add'));
Route::post("/admin/product/postAdd",array('as'=>'admin.product.add','uses'=>'ProductController@PostAdd'));
Route::post("/admin/product/uploadImage",array('as'=>'admin.product.add','uses'=>'ProductController@UploadImage'));
Route::get("/admin/product/add/getAllCatLev1FromBranchID",array('as'=>'admin.product.add','uses'=>'ProductController@GetAllCatLev1FromBranchID'));
Route::get("/admin/product/add/getAllCatFromParentID",array('as'=>'admin.product.add','uses'=>'ProductController@GetAllCatFromParentID'));
Route::get("/admin/product/getAllImage",array('as'=>'admin.product.add','uses'=>'ProductController@GetAllImage'));
Route::get("/admin/product/deleteImage",array('as'=>'admin.product.add','uses'=>'ProductController@DeleteImage'));

Route::get("/admin/product/list",array('as'=>'admin.product.list','uses'=>'ProductController@ListProduct'));

Route::get("/admin/product/edit",array('as'=>'admin.product.edit','uses'=>'ProductController@Edit'));
Route::get("/admin/product/showing",array('as'=>'admin.product.showing','uses'=>'ProductController@SetPagination'));
Route::post("/admin/product/optionalInsert",array('as'=>'admin.product.optional','uses'=>'OptionalProductController@OptionalInsert'));
Route::post("/admin/product/optionalDelete",array('as'=>'admin.product.optional','uses'=>'OptionalProductController@OptionalDelete'));

Route::post("/admin/product/updateListProduct",array('as'=>'admin.product.update','uses'=>'ProductController@UpdateListProduct'));
Route::post("/admin/product/deleteListProduct",array('as'=>'admin.product.delete','uses'=>'ProductController@DeleteListProduct'));


// Brand Route
Route::get("/admin/brand/add",array('as'=>'admin.brand.add','uses'=>'BrandController@Add'));
Route::post("/admin/brand/postAdd",array('as'=>'admin.brand.add','uses'=>'BrandController@PostAdd'));
Route::get("/admin/brand/list",array('as'=>'admin.brand.add','uses'=>'BrandController@ListBrand'));
Route::get("/admin/brand/edit",array('as'=>'admin.brand.edit','uses'=>'BrandController@Edit'));
Route::post("/admin/brand/deleteListBrand",array('as'=>'admin.brand.delete','uses'=>'BrandController@DeleteListBrand'));
Route::post("/admin/brand/updateListBrand",array('as'=>'admin.brand.update','uses'=>'BrandController@UpdateListBrand'));

// Branch Route
Route::get("/admin/branch/add",array('as'=>'admin.branch.add','uses'=>'BranchController@Add'));
Route::post("/admin/branch/postAdd",array('as'=>'admin.branch.add','uses'=>'BranchController@PostAdd'));
Route::get("/admin/branch/list",array('as'=>'admin.branch.add','uses'=>'BranchController@ListBranch'));
Route::get("/admin/branch/edit",array('as'=>'admin.branch.edit','uses'=>'BranchController@Edit'));
Route::post("/admin/branch/deleteListBranch",array('as'=>'admin.branch.delete','uses'=>'BranchController@DeleteListBranch'));
Route::post("/admin/branch/updateListBranch",array('as'=>'admin.branch.update','uses'=>'BranchController@UpdateListBranch'));


// Role Route
Route::get("/admin/role/add",array('as'=>'admin.role.add','uses'=>'RoleController@Add'));
Route::post("/admin/role/postAdd",array('as'=>'admin.role.add','uses'=>'RoleController@PostAdd'));
Route::get("/admin/role/list",array('as'=>'admin.role.add','uses'=>'RoleController@ListRole'));
Route::get("/admin/role/edit",array('as'=>'admin.role.edit','uses'=>'RoleController@Edit'));
Route::post("/admin/role/deleteListRole",array('as'=>'admin.role.delete','uses'=>'RoleController@DeleteListRole'));
Route::post("/admin/role/updateListRole",array('as'=>'admin.role.update','uses'=>'RoleController@UpdateListRole'));


// User Route
Route::get("/admin/user/add",array('as'=>'admin.user.add','uses'=>'UserController@Add'));
Route::post("/admin/user/postAdd",array('as'=>'admin.user.add','uses'=>'UserController@Register'));
Route::get("/admin/user/list",array('as'=>'admin.user.add','uses'=>'UserController@ListUser'));
Route::get("/admin/user/edit",array('as'=>'admin.user.edit','uses'=>'UserController@Edit'));
Route::post("/admin/user/deleteListUser",array('as'=>'admin.user.delete','uses'=>'UserController@DeleteListUser'));
Route::post("/admin/user/updateListUser",array('as'=>'admin.user.update','uses'=>'UserController@UpdateListUser'));
Route::get("/admin/user/showing",array('as'=>'admin.user.showing','uses'=>'UserController@SetPagination'));

//Order Route
Route::get("/admin/order/list",array('as'=>'admin.order.list','uses'=>'OrderController@ListOrder'));