<?php

class BranchController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct(Branch $branch){
    $this->branch = $branch;

    }

    public function Add(){
    return View::make('admin.branch.add')->with('branch', NULL);
    }

    public function PostAdd(){
    $input = Input::all();

    $final_input['id'] = $input['id'];
    $final_input['name'] = $input['name'];
    try
    {
      if (!isset($final_input['id']) || $final_input['id'] == '') { //Create
        $branch = $this->branch->create($final_input);
        return $branch;
      }
      else //Edit
      {
        $branch = Branch::find($final_input['id']);
        $branch->name = $final_input['name'];
        $branch->save();
        return $branch;
      }
    } catch (Exception $exception) {
      return $exception->getMessage() . $exception->getLine();
    }
    }

    public function ListBranch()
    {
    $listBranch = $this->branch->GetAllBranch(50);
    //print_r($listBranch); die();
    return View::make('admin.branch.list')->with('listBranch',$listBranch);
    }

    public function Edit()
    {
    $input = Input::all();
    $branch_id = $input['id'];
    $branch = Branch::find($branch_id);
    return View::make('admin.branch.add')
      ->with('branch',$branch);
    }

    public function UpdateListBranch()
    {
    $input = Input::all();
    $listBranchID = $input['update_list_branch_id'];
    $listBranchID = explode(",",$listBranchID);
    foreach($listBranchID as $p)
    {
      if($input['name'] != '' )
      {
        $branch = Branch::find($p);
        $branch->name = $input['name'];
        $branch->save();
      }
    }
    }


    public function DeleteListBranch()
    {
    $input = Input::all();
    $listBranchID = $input['delete_list_branch_id'];
    DB::table('branchs')->whereIn('id', explode(",",$listBranchID))->delete();
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
