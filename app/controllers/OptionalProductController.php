<?php

class OptionalProductController extends \BaseController {


    protected $optional_product;

    public function __construct(Optional_Product $optional_product){
        $this->optional_product = $optional_product;
    }

    public function OptionalInsert()
    {
        $input = Input::all();
        $final_input['product_id'] = $input['product_id'];
        $final_input['optional_id'] = $input['optional_id'];
        $final_input['from_date'] = $input['from_date'];
        $final_input['to_date'] = $input['to_date'];

        $optional_product = $this->optional_product->create($final_input);
        return $optional_product;
    }

    public function OptionalDelete()
    {
        $input = Input::all();
        $final_input['optional_product_id'] = $input['optional_product_id'];

        $optional_product = Optional_Product::find($final_input['optional_product_id']);
        $optional_product->delete();
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
	public function edit($id)
	{
		//
	}


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
