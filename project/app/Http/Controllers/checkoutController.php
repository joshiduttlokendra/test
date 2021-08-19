<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderStatus;
use App\Models\payments;
use App\Models\products;
use DB;
use Session;
use Auth;
use Illuminate\Http\Request;


class checkoutController extends Controller
{
    public function checkoutProcess(request $request)
    {
        $input= $request->all();
        $shippingAddress=array();
        $shippingAddress['firstName']=$input['firstName'];
        $shippingAddress['lastName']=$input['lastName'];
        $shippingAddress['email']=$input['email'];
        $shippingAddress['phoneNo']=$input['phoneNo'];
        $shippingAddress['streetAddr1']=$input['streetAddr1'];
        $shippingAddress['streetAddr2']=$input['streetAddr2'];
        $shippingAddress['country']=DB::table('countries')->where('id',$request->country)->first('name')->name;
        $shippingAddress['city']=DB::table('cities')->where('id',$request->city)->first()->name ;
        $shippingAddress['zipCode']=$input['zipCode'];
        // print_r(json_decode($shippingAddress));
        $billingAddr=$request->billingAddr ? '1':'0';
        if($billingAddr == 1)
        {
        $billingAddress=array();
        $billingAddress['bFullName']=$input['bFullName'];
        $billingAddress['bStreetAddr1']=$input['bStreetAddr1'];
        $billingAddress['bStreetAddr2']=$input['bStreetAddr2'];
        $billingAddress['bCountry']=DB::table('countries')->where('id',$request->bCountry)->first('name')->name;
        $billingAddress['bCity']=DB::table('cities')->where('id',$request->bCity)->first()->name ;
        $billingAddress['bZipCode']=$input['bZipCode'];
        }
        if($request->paymentMethod == 'Paypal')
        {
            echo "Under Development";
            exit;
        }
        else
        {
            $carts=Session::get('cart');

        $subtotal=0;
        foreach($carts as $key=>$res)
        {
            $productDetail=products::where('id',$key)->first();
            if($productDetail->sale == 1)
            {
                $subtotal +=$productDetail->salePrice * $res['quantity'];
            }
            else
            {
                $subtotal +=$productDetail->price * $res['quantity'];
            }
        }



                $order = new order();
                $order->userId= Auth::id();
                $order->items=json_encode(Session::get('cart'));
                $order->couponId=Session::get('coupon');
                $order->discount=Session::get('couponAmount');
                $order->subtotal=$subtotal;
                $order->grandTotal=$subtotal - Session::get('couponAmount');
                $order->shippingAddress=json_encode($shippingAddress);
                $order->billingAddr=$billingAddr;
                $order->additionalComment=Session::get('AdditionalComment');
                if($billingAddr == 1)
                {
                    $order->billingAddress=json_encode($billingAddress);
                }
                $order->orderStatusId=1;
                $order->save();

                $payment = new payments();
                $payment->orderId=$order->id;
                $payment->status="PENDING";
                $payment->save();

                order::where('id',$order->id)->update(array('paymentId'=>$payment->id));
                $request->session()->forget('cart');
                $request->session()->forget('coupon');
                $request->session()->forget('couponAmount');
                return redirect()->route('orderPlaced');
        }



    }
    public function orderPlaced()
    {
        return view('website.thankyou');
    }
}
