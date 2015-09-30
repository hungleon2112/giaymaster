<?php

class UserController extends \BaseController {


    protected $user;
    public function __construct(Users $user){
        $this->user = $user;
    }


	public function Register()
    {
        $input = Input::all();

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
}
