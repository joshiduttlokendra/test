<?php

namespace App\Http\Controllers;
use App\Models\frequentQuestions;
use App\Models\category;
use App\Models\markets;
use App\Models\services;
use Illuminate\Http\Request;
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
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\PayPal;
use App\Rating;
use Session;
use Razorpay\Api\Api;
use DB;
use Validator;
use URL;
use Redirect;
use App\Models\reviews;
use App\Models\review_like;
use App\Models\review_dislike;
use App\Models\products;
use App\Models\servicebook;
class serviceController extends Controller
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
    }

    //
    public function index()
    {
        if(Auth::user()->roleId==1){
            $serviceAll = services::all();
            return view('adminPanel.services.view', [
                'response' => $serviceAll
            ]);
        }
        else if(Auth::user()->roleId== 2){
            $serviceAll = services::where('added_by',Auth::user()->id)->get();
        return view('adminPanel.services.view', [
            'response' => $serviceAll
        ]);
        }

    }

    public function addServices(Request $request)
    {
        $categories = category::where('status', 1)->where('c_type', '2')->get();
        $markets = markets::where('status', 1)->get();

        return view(
            'adminPanel.services.add',
            [
                'categories' => $categories,
            ]
        );
    }

    public function insertServices(Request $request)
    {
        // dd($request->all());

            $input = $request->all();
            unset($input['_token']);

            $images = array();
            if ($request->hasFile('imageUrl')) {

                foreach ($request->file('imageUrl') as $file) {
                    $name = time() . 'service.' . $file->getClientOriginalExtension();
                    $destinationPath = public_path('/uploads/service');
                    $file->move($destinationPath, $name);
                    $name = "/uploads/service/" . $name;
                    $images[] = $name;

                }
            }
            $input['imageUrl'] = json_encode($images);
            $input['added_by'] = Auth::user()->id;
            services::insert($input);
        session()->flash('message', 'Service Added');
        return back();
    }

    public function deleteServices($id)
    {
        services::where('id', $id)->delete();
        session()->flash('message', 'Product Deleted');
        return back();
    }
  public function services()

    {

        $typo = '0';



        $products = products::where('products.status', 1)->where('products.specialCategory', $typo)
        ->join('markets', 'markets.id', '=', 'products.marketId')        
        ->select('products.*', 'markets.name as mName' , 'markets.id as mid')->get();



        $categories = category::where('c_type', '2')->where('status', '1')->get();

        $response = array();

        foreach ($categories as $category) {



            $category->subCat = category::where('parentId', $category->id)->get();

            $response[] = $category;

        }

        // print_r($response);

        // die;

       // $services = services::where('status', 1)->get();
         $services = DB::table('services')
                    ->join('markets', 'markets.id', '=', 'services.marketId') 
                    ->select('services.*', 'markets.name as mName' , 'markets.id as mid')->get();


        return view(

            'website.services',

            [

                'categories' => $response,

                'products' => $services,

            ]

        );

    }
    public function serviceDetails($id)
    {
     //   $response =  services::where('id',$id)->first();
        $response = DB::table('services')
                    ->join('markets', 'markets.id', '=', 'services.marketId') 
                    ->select('services.*', 'markets.name as mName' , 'markets.id as mid')
                    ->where('services.id',$id)
                    ->first();
       $frequentQuestion =   frequentQuestions::where('dataId', $id)->where('type',0)->get();
       $reviews = reviews::where('dataId', $id)->where('status',1)->where('type',0)->get();
   
       $totalRatings = count(reviews::where('type', 0)->where('dataId', $id)->get());
    
       $rating5 = count(reviews::where('type', 0)->where('dataId', $id)->where('rating', 5)->get());
       $rating4 = count(reviews::where('type', 0)->where('dataId', $id)->where('rating', 4)->get());
       $rating3 = count(reviews::where('type', 0)->where('dataId', $id)->where('rating', 3)->get());
       $rating2 = count(reviews::where('type', 0)->where('dataId', $id)->where('rating', 2)->get());
       $rating1 = count(reviews::where('type', 0)->where('dataId', $id)->where('rating', 1)->get());  

        $relatedService = services::where('category_id', $response->category_id)->where('id', '!=', $response->id)->orWhere('category_id', $response->category_id)->get();
              
 
        return view('website.serviceDetail')  ->with('totalRatings', $totalRatings)->with('rating5', $rating5)->with('rating4', $rating4)
        ->with('rating3', $rating4)->with('rating2', $rating2)->with('rating1', $rating1)->with('reviews',$reviews)->with('frequentQuestion',$frequentQuestion)->with('response',$response)->with('relatedService',$relatedService);
    }


  public function buyservice(Request $request)
  {



        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Product 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->price);
  
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->price);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Enter Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('servicestatus'))
            ->setCancelUrl(URL::route('servicestatus'));

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
                return Redirect::route('checkout');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('checkout');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

      Session::put('service_payment_id', $payment->getId());
       if (isset($redirect_url)) {
        
            return Redirect::away($redirect_url);
        }
    


  }


  public function getServiceStatus(Request $request)
  {
     
      $payment_id = Session::get('service_payment_id');
  
      Session::forget('service_payment_id');
      if (empty($request->input('PayerID')) || empty($request->input('token'))) {
          \Session::put('error', 'Payment failed');
          return Redirect::route('checkout');
      }
      $payment = Payment::get($payment_id, $this->_api_context);
      $execution = new PaymentExecution();
      $execution->setPayerId($request->input('PayerID'));
      $result = $payment->execute($execution, $this->_api_context);

      $service = new servicebook();
      $service->service_id = $request->service_id;
      $service->user_id= 1;
      $service->type=$request->type_radio;
      $service->city_id = $request->city_id;
      $service->country_id =$request->country_id;
      $service->location=$request->loc_radio;
      $service->appointment = $request->appointment;
      $service->price = $request->price;
      $service->payment_id =  $payment_id;
      $service->save();

      \Session::put('success', 'Payment success !!');
      return Redirect::route('paywithpaypal')->with('flash_message_success', 'Your payment was successful!');

     
  }

  public function viewServiceBook()
  {
    $response =  servicebook::all();
    return view('adminPanel.servicebook.view')->with('response',$response);

  }
  public function deleteServicesBook($id)
  {
     servicebook::where('id', $id)->delete();
      session()->flash('message', 'Book Service Deleted');
      return back();
  }
}