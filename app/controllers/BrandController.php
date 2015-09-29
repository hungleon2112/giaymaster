<?php

class BrandController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
  public function __construct(Brand $brand){
    $this->brand = $brand;

  }

  public function Add(){
    return View::make('admin.brand.add')->with('brand', NULL);
  }

  public function PostAdd(){
    $input = Input::all();

    $final_input['id'] = $input['id'];
    $final_input['name'] = $input['name'];
    try
    {
      if (!isset($final_input['id']) || $final_input['id'] == '') { //Create
        $brand = $this->brand->create($final_input);
        return $brand;
      }
      else //Edit
      {
        $brand = Brand::find($final_input['id']);
        $brand->name = $final_input['name'];
        $brand->save();
        return $brand;
      }
    } catch (Exception $exception) {
      return $exception->getMessage() . $exception->getLine();
    }
  }

  public function ListBrand()
  {
    $listBrand = $this->brand->GetAllBrand((Session::get('pagination')) != '' ? Session::get('pagination') : 50);
    //print_r($listBrand); die();
    return View::make('admin.brand.list')->with('listBrand',$listBrand);
  }

  public function Edit()
  {
    $input = Input::all();
    $brand_id = $input['id'];
    $brand = Brand::find($brand_id);
    return View::make('admin.brand.add')
      ->with('brand',$brand);
  }


  public function DeleteListBrand()
  {
    $input = Input::all();
    $listBrandID = $input['delete_list_brand_id'];
    DB::table('brands')->whereIn('id', explode(",",$listBrandID))->delete();
  }
	public function index()
	{
		//
}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
