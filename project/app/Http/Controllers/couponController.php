<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Models\coupon;
use App\Models\newCoupon;
use Illuminate\Http\Request;

class couponController extends Controller
{
    public function createCoupons()
    {
        return view('adminPanel.coupon.add');
    }
    public function insertCoupon (request $request)
    {
        $input=$request->all();
        unset($input['_token']);
        $input['added_by'] = Auth::user()->id;
        coupon::insert($input);
        session()->flash('message', 'Coupon Created');
        return back();
    }
    public function viewCoupons(request $request)
    {
        if(Auth::user()->roleId==1){
            $response=coupon::all();

        }
        elseif(Auth::user()->roleId==2){
            $response=coupon::where('added_by',Auth::user()->id)->get();
        }

        return view('adminPanel.coupon.view')->with('response',$response);
    }
    public function deleteCoupon($id)
    {
        coupon::where('id',$id)->delete();
        session()->flash('message', 'Coupon Deleted');
        return back();
    }
    public function verifyCoupon(request $request)
    {
        
        $type = gettype($request->code);
        if($type = "array")
        {
            
            $validate=coupon::whereIn('code',$request->code)->where('status',1)->sum('amount');
          
        }
        else
        {
            $validate=coupon::where('code',$request->code)->where('status',1)->sum('amount');
        }
      
        
   

        Session::put('coupon',null);
        Session::put('couponAmount',0);
        if(empty($validate))
        {
            $response=array('data'=>[],'message'=>'Invalid Try Again');
        }
        else
        {
            if($validate <= $request->orderAmount)
            {
                $discountis = $request->orderAmount-$validate;
                Session::put('coupon',$validate);
                Session::put('couponAmount',$discountis);
                $response=array('data'=>array('amount'=>$validate),'message'=>'Applied');
            }
            else
            {
                $msg="Order must be $".$validate;
                $response=array('message'=>$msg);
            }

   

        }
        return response()->json($response);

    }
    
        public function createNewCoupon(Request $request)
    {
        $response = $request->all();
        
        $coupon = new newCoupon([
            'status' =>0,
            'data_id' =>1,
            'type' =>0,
            'coupon_type' => $request->get('coupon_type'),
            'coupon_name' => $request->get('coupon_name'),
            'coupon_code' => $request->get('coupon_code'),
            'discount' => $request->get('coupon_discount'),
            'buy' => $request->get('coupon_buy'),
            'get' => $request->get('coupon_get'),
            'start_of_valid' => $request->get('start_of_valid'),
            'end_of_valid' => $request->get('end_of_valid'),
            
            'subscription' => $request->get('subscription'),
        ]);
        $coupon->save();
        return response()->json($response);
    }
}