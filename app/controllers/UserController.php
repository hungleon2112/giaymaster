<?php

class UserController extends \BaseController {


    protected $user;
    protected $role;

    public function __construct(Users $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }


	public function Register()
    {
        $input = Input::all();
        if(!isset($input['id'])) {

            $final_input['name'] = $input['name'];
            $final_input['username'] = $input['username'];
            $final_input['password'] = $input['password'];
            $final_input['phone'] = $input['phone'];
            $final_input['email'] = $input['email'];
            $final_input['address'] = $input['address'];
            $final_input['role_id'] = (isset($input['role_id'])) ? $input['role_id'] : 1;

            $user = $this->user->create($final_input);

            Session::put('user_info', $user);

            return Redirect::route('home.index');
        }
        else
        {
            $input = Input::all();


            $user = User::find($input['id']);

            $final_input['name'] = $input['name'];
            $final_input['username'] = $input['username'];
            $final_input['password'] = $input['password'];
            $final_input['phone'] = $input['phone'];
            $final_input['email'] = $input['email'];
            $final_input['address'] = $input['address'];
            $final_input['role_id'] = (isset($input['role_id'])) ? $input['role_id'] : 1;

            if($final_input['name'] != '') $user->name = $final_input['name'];
            if($final_input['username'] != '') $user->username = $final_input['username'];
            if($final_input['password'] != '') $user->password = $final_input['password'];
            if($final_input['phone'] != '') $user->phone = $final_input['phone'];
            if($final_input['email'] != '') $user->email = $final_input['email'];
            if($final_input['address'] != '') $user->address = $final_input['address'];
            if($final_input['role_id'] != '') $user->role_id = $final_input['role_id'];

            $user->save();
        }
    }

    public function Login()
    {
        $input = Input::all();

        $final_input['username'] = $input['username'];
        $final_input['password'] = $input['password'];
        $user = $this->user->Login($final_input['username'], $final_input['password']);

        if(count($user) != 0){
            Session::put('user_info', $user[0]);
            return Redirect::route('home.index');
        }
        else
        {
            return $_ENV['Login_Fail_Message'];
        }
    }

    public function Logout()
    {
        Session::forget('user_info');
        return Redirect::route('home.index');
    }

    public function CheckUsername($username){
        $user = $this->user->CheckRecordExist("username", $username);
        return count($user);
    }

    public function CheckEmail($email){
        $user = $this->user->CheckRecordExist("email", $email);
        return count($user);
    }

//
    public function Add(){
        $role = $this->role->GetAllRole();
        return View::make('admin.user.add')->with('user', NULL)->with('role', $role);
    }

    public function ListUser()
    {
        $listUser = $this->user->GetAllUser((Session::get('pagination_user')) != '' ? Session::get('pagination_user') : 50);

        return View::make('admin.user.list')->with('listUser',$listUser);
    }

    public function PostEdit()
    {
        $input = Input::all();

        $user = User::find($input['id']);

        $final_input['name'] = $input['name'];
        $final_input['username'] = $input['username'];
        $final_input['password'] = $input['password'];
        $final_input['phone'] = $input['phone'];
        $final_input['email'] = $input['email'];
        $final_input['address'] = $input['address'];
        $final_input['role_id'] = (isset($input['role_id'])) ? $input['role_id'] : 1;

        if($final_input['name'] != '') $user->name = $final_input['name'];
        if($final_input['username'] != '') $user->username = $final_input['username'];
        if($final_input['password'] != '') $user->password = $final_input['password'];
        if($final_input['phone'] != '') $user->phone = $final_input['phone'];
        if($final_input['email'] != '') $user->email = $final_input['email'];
        if($final_input['address'] != '') $user->address = $final_input['address'];
        if($final_input['role_id'] != '') $user->role_id = $final_input['role_id'];

        $user->save();

    }

    public function Edit()
    {
        $input = Input::all();
        $user_id = $input['id'];

        $user = $this->user->FindUser($user_id);
        $role = $this->role->GetAllRole();

        return View::make('admin.user.add')
            ->with('user',$user[0])
            ->with('role',$role);
    }



    public function DeleteListUser()
    {
        $input = Input::all();
        $listUserID = $input['delete_list_user_id'];
        DB::table('users')->whereIn('id', explode(",",$listUserID))->delete();
    }

    public function SetPagination()
    {
        try
        {
            $input = Input::all();
            if(isset($input))
            {
                $pagination = $input['showing'];
                Session::put('pagination_user', $pagination);
            }
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function Get()
    {
        try
        {
            $user_info = Session::get('user_info');
            $user['id'] = $user_info->id;
            $user['name'] = $user_info->name;
            $user['password'] = $user_info->password;
            $user['phone'] = $user_info->phone;
            $user['email'] = $user_info->email;
            $user['address'] = $user_info->address;

            return $user;
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function Update()
    {
        try
        {
            $input = Input::all();

            $user_info = Session::get('user_info');

            $user = User::find($user_info->id);

            $final_input['name'] = $input['name_update'];
            $final_input['password'] = $input['password_update'];
            $final_input['phone'] = $input['phone_update'];
            $final_input['email'] = $input['email_update'];
            $final_input['address'] = $input['address_update'];

            if($final_input['name'] != '') $user->name = $final_input['name'];
            if($final_input['password'] != '') $user->password = $final_input['password'];
            if($final_input['phone'] != '') $user->phone = $final_input['phone'];
            if($final_input['email'] != '') $user->email = $final_input['email'];
            if($final_input['address'] != '') $user->address = $final_input['address'];

            $user->save();

            $user = $this->user->Login($user_info->username, $final_input['password']);

            if(count($user) != 0){
                Session::put('user_info', $user[0]);
                return Redirect::route('home.index');
            }

            return Redirect::route('home.index');
        }
        catch(Exception $e)
        {
            return $e->getMessage();
        }
    }
}
