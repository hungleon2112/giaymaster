<?php

class DiscountController extends \BaseController {

    protected $user;
    protected $role;
    protected $branch;
    protected $discount;

    public function __construct(Discount $discount, Branch $branch, Users $user, Role $role){
        $this->user = $user;
        $this->role = $role;
        $this->branch = $branch;
        $this->discount = $discount;
    }

    public function Add(){
        $role = $this->role->GetAllRoleAgent();
        $listBranch = $this->branch->GetAllBranch();
        return View::make('admin.discount.add')->with('user', NULL)
            ->with('role', $role)
            ->with('listBranch',$listBranch);
    }

    public function PostAdd(){
        $input = Input::all();

        try
        {
            if (!isset($input['id']) || $input['id'] == '') { //Create
                $discount = $this->discount->create($input);
                return $discount;
            }
            else //Edit
            {
                $discount = Discount::find($input['id']);
                $discount->role_id = $input['role_id'];
                $discount->branch_id = $input['branch_id'];
                $discount->from_rate = $input['from_rate'];
                $discount->to_rate = $input['to_rate'];
                $discount->percentage = $input['percentage'];
                $discount->save();
                return $discount;
            }
        } catch (Exception $exception) {
            return $exception->getMessage() . $exception->getLine();
        }
    }

    public function ListDiscount()
    {
        $listDiscount = $this->discount->GetAllDiscount(50);
        //print_r($listBranch); die();
        return View::make('admin.discount.list')->with('listDiscount',$listDiscount);
    }

    public function DeleteListDiscount()
    {
        $input = Input::all();
        $listDiscountID = $input['delete_list_discount_id'];
        DB::table('discounts')->whereIn('id', explode(",",$listDiscountID))->delete();
    }

    public function Edit()
    {
        $input = Input::all();
        $discount_id = $input['id'];
        $role = $this->role->GetAllRoleAgent();
        $listBranch = $this->branch->GetAllBranch();
        $discount = Discount::find($discount_id);
        return View::make('admin.discount.add')
            ->with('discount',$discount)
            ->with('role', $role)
            ->with('listBranch',$listBranch);
    }
}
