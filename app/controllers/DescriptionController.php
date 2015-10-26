<?php

class DescriptionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    protected $description;

    public function __construct(Description $description){
        $this->description = $description;

    }

    public function Add($id){
        $description = Description::find($id);
        return View::make('admin.description.add')->with('description', $description);
    }

    public function PostAdd(){
        $input = Input::all();

        $final_input['id'] = $input['id'];
        $final_input['description'] = $input['website_description_full'];
        try
        {
            $description = Description::find($final_input['id']);
            $description->description = $final_input['description'];
            $description->save();
            return $description;
        } catch (Exception $exception) {
            return $exception->getMessage() . $exception->getLine();
        }
    }

    public function ListRole()
    {
        $listRole = $this->role->GetAllRole(50);
        return View::make('admin.role.list')->with('listRole',$listRole);
    }

    public function Edit()
    {
        $input = Input::all();
        $role_id = $input['id'];
        $role = Role::find($role_id);
        return View::make('admin.role.add')
            ->with('role',$role);
    }

    public function UpdateListRole()
    {
        $input = Input::all();
        $listRoleID = $input['update_list_role_id'];
        $listRoleID = explode(",",$listRoleID);
        foreach($listRoleID as $p)
        {
            if($input['name'] != '' )
            {
                $role = Role::find($p);
                $role->name = $input['name'];
                $role->save();
            }
        }
    }


    public function DeleteListRole()
    {
        $input = Input::all();
        $listRoleID = $input['delete_list_role_id'];
        DB::table('roles')->whereIn('id', explode(",",$listRoleID))->delete();
    }

}
