<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\cart;
use App\Models\cartItems;
use App\Models\earning;
use App\Models\earningLogsA;
use App\Models\earningLogsV;
use App\Models\markets;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
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
use App\Models\order;
use App\Models\orderStatus;
use App\Models\payments;
use App\Models\products;
use DB;
use Auth;

class PaypalController extends Controller
{
    // private $_api_context;

    // public function __construct()
    // {

    //     $paypal_configuration = \Config::get('paypal');
    //     $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
    //     $this->_api_context->setConfig($paypal_configuration['settings']);
    // }

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
    }

    public function payWithPaypal()
    {
        return view('paywithpaypal');
    }

    public function postPaymentWithpaypal(Request $request)
    {

        $request->validate([
            'city' => 'required',
            'country' => 'required',
            'paymentMethod' => 'required',
           'streetAddr1' => 'required',
           'streetAddr2' => 'required',
           'firstName' => 'required',
           'lastName' => 'required',
            'email' => 'required',
            'phoneNo' => 'required',
            ] , 
        [
                'streetAddr1.required' => 'The :attribute street address 1 field is required.',
                'streetAddr2.required' => 'The :attribute street address 2 field is required.'
        ]
        );

        $input = $request->all(); 
      
        $user_email =$input['email'];    
        $shippingAddress = array();
        $shippingAddress['firstName'] = $input['firstName'];
        $shippingAddress['lastName'] = $input['lastName'];
        $shippingAddress['email'] = $input['email'];
        $shippingAddress['phoneNo'] = $input['phoneNo'];
        $shippingAddress['streetAddr1'] = $input['streetAddr1'];
        $shippingAddress['streetAddr2'] = $input['streetAddr2'];
        $shippingAddress['country'] = $input['country'];
       $shippingAddress['city'] =  $input['city'];
     
      
        $shippingAddress['zipCode'] = $input['zipCode'];
        // print_r(json_decode($shippingAddress));
        $billingAddr = $request->billingAddr ? '1' : '0';
        if ($billingAddr == 1) {
            $billingAddress = array();
            $billingAddress['bFullName'] = $input['bFullName'];
            $billingAddress['bStreetAddr1'] = $input['bStreetAddr1'];
            $billingAddress['bStreetAddr2'] = $input['bStreetAddr2'];
            $billingAddress['bCountry'] =  $input['country'];
            $billingAddress['bCity'] = $input['city'];
            $billingAddress['bZipCode'] = $input['bZipCode'];
        }

        $cart = array();

   if(Auth::user())
     {
       $id =$request->pid;
       if($id==0)
       {
            $cartdd = DB::table('carts')->where('userId' , Auth::id())->where('status','1')->first();      
            $cartIddd = $cartdd->id;
         
            $productId = null;
            $user_id = Auth::id();
       } 

       else
       {
        
          $cartdd = DB::table('products')->where('id' , $id)->first(); 
          $productId = $id;
          $cartIddd = null;
          $user_id = Auth::id();
          $subtotal = 0;
          $productDetail = products::where('id', $id)->first();
          $subtotal = $productDetail->salePrice * 1;
       }
   }
   else
   {
    $id =$request->pid;
    if(!$id==0)
    {
     
       $cartdd = DB::table('products')->where('id' , $id)->first(); 
       $cartIddd = null;
       $productId = $id;
       $user_id = null; 
       $subtotal = 0;
       $productDetail = products::where('id', $id)->first();
       $subtotal = $productDetail->salePrice * 1;
    }
    else
    {
        $subtotal =0;
    $response = Session::get('cart');

    $sid =[];
    $sprice =[];
    foreach($response as $key => $res)
    {
     
        array_push($sid,$res['productId']);
    }  
    $productId =json_encode($sid);
    $cartIddd = null;
           
            //  foreach ($response as $key => $res) 
            //  {
                $product_id= json_decode($productId);

                 $productDetail = products::whereIn('id', $product_id)->get();
                 foreach($productDetail as  $value)
                 {
                    $subtotal += $value['price'] * $res['quantity'];
                 }
                
          
        } 
 }

   



     
       // $cartIddd = cart::where('userId', Auth::id())->where('status', '1')->first()->id;
       

        $order = new order();
        $order->userId = Auth::id();
        $order->cartId = $cartIddd;
        $order->productId = $productId;
        $order->couponId = Session::get('coupon');
        $order->discount = Session::get('couponAmount');
        $order->subtotal = $subtotal;
        $order->grandTotal = $subtotal - Session::get('couponAmount');
        $order->shippingAddress = json_encode($shippingAddress);
        $order->billingAddr = $billingAddr;
        $order->additionalComment = Session::get('AdditionalComment');
        if ($billingAddr == 1) {
            $order->billingAddress = json_encode($billingAddress);
        }
    
        $order->orderStatusId = 1;
        $order->save();
        $orderid =DB::getPdo()->lastInsertId();
     
        $payment = new payments();
        $payment->orderId = $order->id;
        if ($request->paymentMethod == 'Paypal') {
            $payment->status = "PROCESSING";
        } else
         {
            $payment->status = "PENDING";
        }
        $payment->save();
     
        order::where('id', $order->id)->update(array('paymentId' => $payment->id));

    
        $request->session()->forget('cart');
        $request->session()->forget('coupon');
        $request->session()->forget('couponAmount');


    
    
    if(!empty(Session::get('couponAmount')))
    {
        $totalamount  = $subtotal -Session::get('couponAmount');
    }
    else
    {
        $totalamount = $subtotal;
    }
    if ($request->paymentMethod == 'cash') 
    {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: ScoutinOnline <dev@devs.pearl-developer.com>' . "\r\n";
    
        $subject = "Thank you for your order!";
          $message = '<html><body>';
          $message .= '<img src="img/logo.png" alt="Hotel" /><br/>';
          $message .= '<table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;">'; 
          $message .=  '<tr>'; 
          $message .=  '<th>Product:</th>';
          $message .=  '<td>CodexWorld</td>';                 
          $message .=  '<tr style="background-color: #e0e0e0;">';
          $message .= '</table>'; 
          $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
          $message = '<p>Your order has been placed and will be processed as soon as possible.</p>';
          $message .= '<p style="color:#3366FF;font-size:14px;">Make sure you make note of your order number, which is'.' ,</p>';
          $message .= '<p>You will be receiving an email shortly with confirmation of your order.</p>';
          $message .= '<p>Website:<a href="http://scoutin.devs.pearl-developer.com/">www.ScoutinOnline.com</a></p>';
          $message .= "</table>";
          $message .= "</body></html>";
        
        mail($user_email,$subject,$message,$headers);
        return redirect()->route('orderPlaced');
    } 



    else if ($request->paymentMethod == 'Paypal') {
            

            $payer = new Payer();
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
            $redirect_urls->setReturnUrl(URL::route('status'))
                ->setCancelUrl(URL::route('status'));

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

            Session::put('paypal_payment_id', $payment->getId());

            if (isset($redirect_url)) {
                return Redirect::away($redirect_url);
            }

            \Session::put('error', 'Unknown error occurred');
            return Redirect::route('paywithpaypal3');
        } else {

            return redirect()->route('orderPlaced');
        }
    }
    

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::route('paywithpaypal46');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            \Session::put('success', 'Payment success !!');
            $orderId = order::where('userId', Auth::id())->orderBy('id', 'DESC')->first()->id;
            $paymentId = order::where('id', $orderId)->first()->paymentId;



            $this->earningFunction($orderId);



            payments::where('id', $paymentId)->update(array('status' => 'PAID', 'transactionId' => $payment_id));
            $request->session()->forget('cart');
            $request->session()->forget('coupon');
            $request->session()->forget('couponAmount');
            return redirect()->route('orderPlaced');
        }

        \Session::put('error', 'Payment failed !!');
        return Redirect::route('paywithpaypal545');
    }


    public function earningFunction($orderId)
    {
        $cartId = order::where('id', $orderId)->first()->cartId;
        $cartItems = cartItems::where('cartId', $cartId)->get();
        $aCommission = 0;
        foreach ($cartItems as $items) {
            $marketId = products::where('id', $items->productId)->first()->marketId;
            $vendorId= markets::where('id',$marketId)->first()->vendorId;
            $adminCommission = ($items->price * (products::where('id', $items->productId)->first()->adminCommission)) / 100;
            $aCommission += ($items->price - $adminCommission) * $items->quantity;
            $checkVen = earning::where('userId', $vendorId)->first();
            if (isset($checkVen->id)) {
                $prevEarning = earning::where('userId', $vendorId)->first()->earning;
                $eeeeeee=(($items->price * $items->quantity) - ($items->price - $adminCommission) * $items->quantity) + $prevEarning;
                // DB::table('earnings')->where('userId', $vendorId)->update(['earning' => $eeeeeee]);
                earning::where('userId', $vendorId)->update(array('earning'=> $eeeeeee));
                // $earningU=earning::find(['userId'=>$vendorId]);
                // $earningU->earning=$eeeeeee;
                // $earningU->save();
            } else {
                $earning = new earning();
                $earning->userId = $vendorId;
                $earning->earning = ($items->price * $items->quantity) - ($items->price - $adminCommission) * $items->quantity;
                $earning->save();
            }

            $vendorEarning = new earningLogsV();
            $vendorEarning->orderId = $orderId;
            $vendorEarning->productId = $items->id;
            $vendorEarning->vendorId = $vendorId;
            $vendorEarning->earning = ($items->price * $items->quantity) - ($items->price - $adminCommission) * $items->quantity;
            $vendorEarning->save();
        }
        $vendorEarningg = new earningLogsA();
        $vendorEarningg->orderId = $orderId;
        $vendorEarningg->tax = 0;
        $vendorEarningg->discount = order::where('id', $orderId)->first()->discount;
        $vendorEarningg->earning = $aCommission;
        $vendorEarningg->save();


        if (count(earning::where('userId', 1)->get()) != 0) {
            $prevEarning = earning::where('userId', 1)->first()->earning;
            earning::where('userId', 1)->update(array('earning'=> ($aCommission + $prevEarning)));
        } else {
            $earning = new earning();
            $earning->userId = 1;
            $earning->earning = $aCommission;
            $earning->save();
        }



    }
}