<?php
/**
 * Created by PhpStorm.
 * User: Hp 840 G1
 * Date: 10/14/2015
 * Time: 2:57 PM
 */

class CouponController  extends BaseController {

    public function __construct(Coupon $coupon){
        $this->coupon = $coupon;

    }

    public function Add(){
        return View::make('admin.coupon.add')->with('coupon', NULL);
    }

    public function PostAdd(){
        $input = Input::all();

        $final_input['id'] = $input['id'];
        $final_input['code'] = $input['code'];
        $final_input['description'] = $input['description'];
        $final_input['from_date'] = $input['from_date'];
        $final_input['to_date'] = $input['to_date'];
        try
        {
            if (!isset($final_input['id']) || $final_input['id'] == '') { //Create
                $coupon = $this->coupon->create($final_input);
                return $coupon;
            }
            else //Edit
            {
                $coupon = Coupon::find($final_input['id']);
                $coupon->code = $final_input['code'];
                $coupon->description = $final_input['description'];
                $coupon->from_date = $final_input['from_date'];
                $coupon->to_date = $final_input['to_date'];
                $coupon->save();
                return $coupon;
            }
        } catch (Exception $exception) {
            return $exception->getMessage() . $exception->getLine();
        }
    }

    public function ListCoupon()
    {
        $listCoupon = $this->coupon->Coupon_List();
        //date_format($d, 'd/m/Y H:i:s');
        return View::make('admin.coupon.list')->with('listCoupon',$listCoupon);
    }

    public function Edit()
    {
        $input = Input::all();
        $coupon_id = $input['id'];
        $coupon = Coupon::find($coupon_id);

        return View::make('admin.coupon.add')
            ->with('coupon',$coupon);
    }

    public function UpdateListCoupon()
    {
        $input = Input::all();
        $listCouponID = $input['update_list_coupon_id'];
        $listCouponID = explode(",",$listCouponID);
        foreach($listCouponID as $p)
        {
            $coupon = Coupon::find($p);
            $coupon->code = $input['code'];
            $coupon->description = $input['description'];
            $coupon->from_date = $input['from_date'];
            $coupon->to_date = $input['to_date'];
            $coupon->save();
        }
    }


    public function DeleteListCoupon()
    {
        $input = Input::all();
        $listCouponID = $input['delete_list_coupon_id'];
        DB::table('coupons')->whereIn('id', explode(",",$listCouponID))->delete();
    }
} 