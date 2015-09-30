<?php

class RoleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function __construct(Role $role){
        $this->role = $role;

    }

    public function Add(){
        return View::make('admin.role.add')->with('role', NULL);
    }

    public function PostAdd(){
        $input = Input::all();

        $final_input['id'] = $input['id'];
        $final_input['name'] = $input['name'];
        try
        {
            if (!isset($final_input['id']) || $final_input['id'] == '') { //Create
                $role = $this->role->create($final_input);
                return $role;
            }
            else //Edit
            {
                $role = Role::find($final_input['id']);
                $role->name = $final_input['name'];
                $role->save();
                return $role;
            }
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
