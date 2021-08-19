<?php

namespace App\Http\Controllers;

use App\Models\cartItems;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\address;
use App\Models\newsletter;
use App\Models\reviews;
use App\Models\email;
use App\Models\products;
use App\Models\wishList;
use App\Models\country;
use App\Models\User;
use App\Models\earningLogsV;
use App\Models\withdrawRequest;
use Auth;
use DB;
use Razorpay\Api\Api;
use Session;
use Redirect;
use Input;
use Exception;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use URL;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Models\order_return;
class orderController extends Controller
{

    private $_api_context;
    public function __construct()
    {

        $paypal_configuration = \Config::get('paypal');

        $this->_api_context = new ApiContext(new OAuthTokenCredential('AXN9ha-HgPPfp019Jd8m2XHQpOOPh19O6_tyomFU3fqLtyCm7kEUBm8OFYf7KYnPnauB-Lyg-j7-amYq', 'EJVJj1B5dMqe5hS05dMAzsGwUG0reh-0DTxZnXwfT0Bng8WwAIqMavgBJTkJQLYzMW7B6sYdhahSHyAs'));
        $this->_api_context->setConfig(array(
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 1000,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'FINE'
        ));
    }   public function orders()
    {

        // $response = order::where('userId', Auth::id())->simplePaginate(5);
        $id =Auth::id();
        $response = DB::table('orders as o')
                  ->leftjoin('order_statuses as os', 'os.id', '=', 'o.orderStatusId')
                  ->select('o.*', 'os.name as name')
                  ->where('o.userId' , $id)
                  ->simplePaginate(5);

        return view('website.user.orders')->with('response', $response);
    }
    public function address()
    {
        $response = address::where('userId', Auth::id())->simplePaginate(5);
        $countries = country::all();
        return view('website.account-address')->with('response', $response)->with('countries' , $countries);
    }
    public function removeAddress($id)
    {
        address::where('id', $id)->delete();
        session()->flash('message', 'Address Deleted');
        return back();
    }
    public function removewishlist($id)
    {
        wishList::where('id', $id)->delete();
        session()->flash('message', 'WishList Deleted');
        return back();
    }
    public function insertaddress(Request $request)
    {

        $input=$request->all();
        unset($input['_token']);

        address::insert($input);
        session()->flash('message', 'Address Created');
        return back();
    }

   public function accountReview()
   {
    $response = reviews::where('userId', Auth::id())->simplePaginate(5);
    return view('website.account-review')->with('response', $response);
   }
   public function accountPayment()
   {
    return view('website.account-payment');
   }
   public function editaddress($id)
   {
      $response= DB::table('addresses as a')             
            ->leftjoin('countries as c', 'c.id', '=', 'a.country')
            ->leftjoin('cities as cc', 'cc.id', '=', 'a.city') 
            ->where('a.id',$id)       
            ->select('a.*', 'c.name as cname' ,'cc.name as ccname')
            ->first();
       return view('website.editaccount-address')->with('response' , $response);
   }
   public function updateaddress($id, Request $request)
   {
        $data = address::find($id);
        $data->street1 =  $request->get('street1');
        $data->country =  $request->get('country');
        $data->city = $request->get('city');
        $data->zipCode = $request->get('zipCode');
        $data->street2 = $request->get('street2');
        $data->postalCode = $request->get('postalCode');
        $data->shippingAddress = $request->get('shippingAddress');
        $data->billingAddress = $request->get('billingAddress');
        $data->save();
        session()->flash('message', 'Address Updated');
        return back();
   }
   public function notification()
   {
    $response ='';
     if(Auth::check())
     {
        $uid= Auth::user()->id;
        $data =  DB::table('newsletters')->where('id' , $uid)->first();
        if(!empty($data))
        {
            $response =   DB::table('emails')->simplePaginate(5);
        }
     }
     return view('website.account-notification')->with('response', $response);
   }

   public function accountWishlist()
   {
    if(Auth::check())
    {
       $uid= Auth::user()->id;
    }
    $response1 ="";
    $response="";
    $data2 = DB::table('wish_lists')->where('userId' , $uid)->where('type' ,'=',0)->get();

    if(empty($data2))
    {
        $response1 = DB::table('wish_lists as w')
        ->leftjoin('services as s' , 's.id' , '=' ,'w.dataId')
        ->select('s.*' , 'w.id as wid')
        ->where('w.userId',$uid)
        ->where('w.type' , '=' , 0)
        ->get();
    }

     $data = DB::table('wish_lists')->where('userId' , $uid)->where('type' ,'=' ,1)->get();

     if(!empty($data))
     {
        $response = DB::table('wish_lists as w')
        ->leftjoin('products as p' , 'p.id' , '=' ,'w.dataId')
        ->select('p.*' , 'w.id as wid')
        ->where('w.userId',$uid)
        ->where('w.type' , '=' , 1)
        ->get();
     }

    return view('website.account-wishlist')->with('response', $response)->with('response1', $response1);

   }
 
       public function orderManagement(Request $request)
    {
        
        $user_id = Auth::id();
        // $pid = DB::table('orders')->pluck('productId');
        // $product_id= json_decode($pid);
        $all_order  = DB::table('orders')->get();
        //dd($all_order);
        
        $data_arr= [];
     
       
        foreach($all_order as $key => $value):
            $product_json=json_decode($value->productId);
            $product_qty_json = json_decode($value->quantity);
       
            if(is_array($product_json)):
                foreach($product_json as $key2 => $val2):
                
                    if(Auth::check()):
                        if(Auth::user()->roleId==2):
                            $product_info = DB::table('products')->where('id' , $val2)->where('vendorId',$user_id)->first();
                        endif;    
                    endif;    
                      $product_info = DB::table('products')->where('id' , $val2)->first();
                      $product_qty = $product_qty_json[$key2];
                  
                    // $key = $key
               
                    // $qty = '';
                    // $qty = json_decode($all_order->quantity);
                    // if($qty!=0):
                     
                    //     dump($qty);
                    // endif;  

                 
                    $product_info_arr = [
                        'product_id'=>$product_info->id,
                        'sku'=>$product_info->sku,  
                        'price'=>$product_info->price,
                        'product_name'=>$product_info->name,
                        'userId'=>$all_order[$key]->userId,
                        'subtotal'=>$all_order[$key]->subtotal,
                        'couponId' => $all_order[$key]->couponId,                     
                        'subtotal' => $all_order[$key]->subtotal,
                        'grandTotal' => $all_order[$key]->grandTotal,
                        'discount' => $all_order[$key]->discount,
                        'order_id' => $all_order[$key]->id,
                       'quantity' =>  $product_qty ,
                    ] ;
                    array_push($data_arr,$product_info_arr);
                   
                             
                endforeach;
             endif;

        endforeach;
      
    $all_order = $data_arr;
 
 
        return view('adminPanel.order.view', [
            'response' => $all_order
        ]);
    }

    public function viewFullOrder($id)
    {

       // dd($id);
        $data = order::where('id' , $id)->first();
        $crtid = $data->cartId ;
        $product ='';
        $allCartProduct ='';
        $cart_details ='';
        $order_data ='';
        if(!empty($crtid)):
            $cart_details = order::where('cartId', $crtid)->first();
            $allCartProduct = cartItems::where('cartId', $crtid)->get();
            $product = [];
            foreach ($allCartProduct as $key => $item)
            {
                if ($item->type == '1') {
                    $product[$key]['product'] = products::where('id', $item->productId)->first();
                    $product[$key]['cart'] = $item;
                } elseif ($item->type == '0') {
                    $product[$key]['product'] = products::where('id', $item->productId)->first();
                    $product[$key]['cart'] = $item;
                }
            }
        else:
          // dd($id);
            $order_data1 = order::where('id' , $id)->first(); 
            // $pid= $order_data1->productId;
            //  dd($pid);
            // $product_info = DB::table('products')->where('id' , $pid)->first();
             $data_arr1= [];
            // $product_qty_json = json_decode($order_data1->quantity);
         
         
            $order_data = [
          
                'grandTotal' =>$order_data1->grandTotal,
                'shippingAddress' => $order_data1->shippingAddress,
                'order_id' => $order_data1->id,
                'created_at' => $order_data1->created_at,
               'productId' =>$order_data1->productId,
            ];
            array_push($data_arr1,$order_data);  
       
            $order_data = $data_arr1;  
        endif;    

            return view(
                'adminPanel.order.single',
                [
                    'allProduct' => $product,
                    'response' => $allCartProduct,
                    'cart_details' => $cart_details ,
                    'order_data' => $order_data
                ]
            );
    }
    public function cancelorder($id)
    {
       $data = DB::table('orders')->where('id' , $id)->first();
       $od = $data->created_at;
       $ldate = date('Y-m-d H:i:s');
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $od);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $ldate);
        $diff_in_hours = $to->diffInHours($from);

        if($diff_in_hours)
        {
           $data= order::where('id', $id)->update(['orderStatusId' => 0]);

            session()->flash('message', 'Order Canceled');
            return back();
        }
        else
        {  session()->flash('message', 'you can cancel order after 3hours ');
            return back();

        }


    }
    
      public function accountReturn()
    {
        return view('website.account-return');
    }
    public function OrderReturn(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'orderId' => 'required',
            'reason' => 'required',


        ], [
            'name.required' => 'Name is required',
            'order.required' => 'Order Id is required'
        ]);

        $input=$request->all();
        $file=$request->file('image');
        $name=$file->getClientOriginalName();
        $file->move('orderreturn/product/',$name);
        
        $images=$name;
        $input['image']='orderreturn/product/'.$images;
        unset($input['_token']);
        order_return::insert($input);
        session()->flash('message', 'order return request sent successfully.. ');
        return back();
    }
   public function ViewOrderReturn()
    {
        $response =order_return::all();
        return view('adminPanel.order.orderreturn')->with('response',$response);
    }
      public function OrderReturn_Detail($id)
    {
        if(Auth::check())
        {
          
            if(Auth::user()->roleId==2)
            {
              
                  $response = DB::table('orders as o')
                   ->leftjoin('users as u', 'u.id' ,'=' , 'o.userId')
                   ->leftjoin('products as p' , 'p.id' , '=' , 'o.productId')
                   ->select('o.*' , 'p.name as pName' , 'u.name as uName')      
                  ->where('o.id', $id)->where('u.roleId',2)->first();
            }
            else
            {
                
                    $response = DB::table('orders as o')
                   ->leftjoin('users as u', 'u.id' ,'=' , 'o.userId')
                   ->leftjoin('products as p' , 'p.id' , '=' , 'o.productId')
                   ->select('o.*' , 'p.name as pName' , 'u.name as uName')      
                  ->where('o.id', $id)->first();

            }
            return view('adminPanel.order.single_order_return')->with('response',$response);
        }
    
    }
    public function invoiceStatusUpdate(Request $request)
    {
        dd($request->all());


    }
    public function invoice($orderId)
    {
        $cartId = order::where('id',$orderId)->first();
        $response = cartItems::where('cartId', $cartId->cartId)->get()->toArray();
        $cart=array();

                foreach ($response as $key => $res) {
                    $res['pDetail'] = products::where('products.id', $res['productId'])
                    ->join('markets', 'markets.id', '=', 'products.marketId')
                    ->select('products.*', 'markets.name as mName')->first();
                    $cart[] = $res;
                }


        return view('website.componets.invoice')->with('cartId',$cartId)->with('cart',$cart);
    }

    public function coupongift()
    {
      $id = Auth::id();
      $response= $response = DB::table('orders as o')
                ->leftjoin('coupons as c', 'c.id', '=', 'o.couponId')
                ->select('c.*')
                ->where('o.userId' , $id)
                ->simplePaginate(5);

       return view('website.account-coupon')->with('response',$response);
    }
 
    public function withdrawManagement()
    {
        if(Auth::check())
        {
            if(Auth::user()->roleId==2)
            {
                $response = DB::table('earning_logs_v_s as e')
                ->leftjoin('products as p', 'p.id', '=', 'e.productId')
                ->select('e.*' , 'p.name as pname')
                ->where('e.vendorId' , Auth::user()->id)
              ->get();
            }
                
            else
            {
                $response = DB::table('earning_logs_v_s as e')
                ->leftjoin('products as p', 'p.id', '=', 'e.productId')
                ->select('e.*' , 'p.name as pname')
               ->get(); 
           
                 
            }  
        }
      
       return view('adminPanel.withdraw.view')->with('response' , $response);

    }

      public function withdrawRequest($id)
    {
      
        if(Auth::check())
            {
               $user = User::find(Auth::user()->id);
               $user_email =$user->email;
    
               $response = DB::table('earning_logs_v_s')->where('id' , $id)->first();
             
            }
        return view('adminPanel.withdraw.singleview')->with('response',$response);    
    }  

    public function WrequestSent(Request $request)
    {
     
        if(Auth::check())
        {
           $user = User::find(Auth::user()->id);
           $user_email =$user->email;

         //  $response = DB::table('earning_logs_v_s')->where('id' , $id)->first();
         //  $response->earning;

        $detail = $request->account_detail;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

         $headers .= 'From:'.$user_email.' <dev@devs.pearl-developer.com>' . "\r\n";
  
         $subject = "Earning";
         
         $message = $detail;
     

         $response = mail('saeema@pearlorganisation.com',$subject,$message,$headers);

        }
        
         if( $response == true ) {
          
            $data = new withdrawRequest([
                'vendorId' => $request->get('vendorId'),
                'earning' => $request->get('earning'),
                'account_detail' => $request->get('account_detail'),
                'payment_type' =>null,
                'email' => $user_email,
            ]);
            $data->save();
            session()->flash('message', 'Request sent successfully...');

            return back();
           
         }else {
            session()->flash('message', 'Request could not be sent...');
            return back();
         }
       
    }
        public function allvendorRequest()
            {
                $response = DB::table('withdraw_requests')->simplePaginate(5); 
           
                return view('adminPanel.withdraw.request')->with('response' , $response);
            }
            
               public function Withdrawpayment(Request $request)
   {
 
    $payer = new Payer();
    $totalamount = $request->earning;
    $eid = $request->earning_id;
    $payer->setPaymentMethod('paypal');

    $item_1 = new Item();

    $item_1->setName('Product 1')
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setPrice($totalamount);

    $item_list = new ItemList();
    $item_list->setItems(array($item_1));

    $amount = new Amount();
    $amount->setCurrency('USD')
        ->setTotal($totalamount);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription('Enter Your transaction description');

    $redirect_urls = new RedirectUrls();
    $redirect_urls->setReturnUrl(URL::route('status1'))
        ->setCancelUrl(URL::route('status1'));

    $payment = new Payment();
    $payment->setIntent('Sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));
    try {
        $payment->create($this->_api_context);
    } catch (\PayPal\Exception\PPConnectionException $ex) {
        if (\Config::get('app.debug')) {
            \Session::put('error', 'Connection timeout');
            return Redirect::route('paywithpaypal1');
        } else {
            \Session::put('error', 'Some error occur, sorry for inconvenient');
            return Redirect::route('paywithpaypal2');
        }
    }

    foreach ($payment->getLinks() as $link) {
    
        if ($link->getRel() == 'approval_url') {
            $redirect_url = $link->getHref();
         
            break;
        }
    }

    Session::put('paypal_payment_id1', $payment->getId());
    Session::put('earning_id' ,$eid);

    if (isset($redirect_url)) {
    
        return Redirect::away($redirect_url);
    }

    \Session::put('error', 'Unknown error occurred');
    return Redirect::route('paywithpaypal3');
} 


public function getPaymentStatus1(Request $request)
{
  
    $payment_id1 = Session::get('paypal_payment_id1');
     $eid1 = Session::get('earning_id');
    Session::forget('paypal_payment_id1');
    if (empty($request->input('PayerID')) || empty($request->input('token'))) {
        \Session::put('error', 'Payment failed');
        return Redirect::route('paywithpaypal46');
    }
    $payment = Payment::get($payment_id1, $this->_api_context);
    $execution = new PaymentExecution();
    $execution->setPayerId($request->input('PayerID'));
    $result = $payment->execute($execution, $this->_api_context);

    if ($result->getState() == 'approved') {
        \Session::put('success', 'Payment success !!');
        $earning = earningLogsV::find($eid1);
        $earning->status  = "Paid";
        $earning->earning = "0.00";
        $earning->payment_id  =$payment_id1;
        $earning->save();
       return back();
    }

    \Session::put('error', 'Payment failed !!');
    return Redirect::route('paywithpaypal545');
}
}