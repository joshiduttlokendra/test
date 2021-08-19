<?php



namespace App\Http\Controllers;



use App\Models\brands;

use Session;

use App\Models\products;

use App\Models\category;

use App\Models\frequentQuestions;

use App\Models\reviews;

use App\Models\review_like;

use App\Models\review_dislike;

use App\Models\cart;

use App\Models\services;

use App\Models\faq;

use App\Models\testimonal;

use Illuminate\Http\Request;
use App\Models\indexbanner;
use App\Models\membershipShopper;
use App\Models\membershipVendor;

use DB;

use Auth;



class indexController extends Controller

{

    public function index()

    {
    $indexbanner = DB::table('indexbanners')->take(1)->get();
        $slider = DB::table('sliders')->where('status' , '=' , 1)->get();

        $banner = DB::table('banners')->where('status' , '=' , 1)->get();

        $saleProducts = products::where('products.sale', 1)->where('products.status', 1)->join('markets', 'markets.id', '=', 'products.marketId')->where('products.adminApproval','=','1')->select('products.*', 'markets.name as mName' ,'markets.id as mid')->get();

        // $buyAgain=cart::where('carts.status',0)->join('cart_items','cart_items.cartId','=','carts.id')->join('products','cart_items.productId','=','products.id')->where('products.status',1)->join('markets','markets.id','=','products.marketId')->select('products.*','markets.name as mName')->get();

        $buyAgain = array();

        if (Auth::id()) {

            $buyAgain = DB::select('SELECT *,mr.name as mName,pro.imageUrl as imageUrl FROM carts AS ct JOIN cart_items AS ci ON ct.id = ci.cartId JOIN products AS pro ON ci.productId = pro.id JOIN markets AS mr ON pro.marketId = mr.id WHERE ct.status= "0" AND ct.userId = 11 AND pro.status = "1" and pro.adminApproval="1" AND mr.status = "1" AND ct.userId = ' . Auth::id());

        }






        $seasonProducts = products::where('products.seasonal', 1)->where('products.status', 1)->join('markets', 'markets.id', '=', 'products.marketId')->where('products.adminApproval','=','1')
        ->select('products.*', 'markets.name as mName' ,'markets.id as mid')->get();

        $featuredProducts = products::where('products.featured', 1)
        ->where('products.status', 1)
        ->join('markets', 'markets.id', '=', 'products.marketId')->where('products.adminApproval','=','1')->select('products.*', 'markets.name as mName' ,'markets.id as mid')->get();

        $caribbeanProducts = products::where('products.specialCategory', 1)
        ->where('products.status', 1)
        ->join('markets', 'markets.id', '=', 'products.marketId')
        ->where('products.adminApproval','=','1')->select('products.*', 'markets.name as mName' ,'markets.id as mid')->get();

        $beThrifty = products::where('products.specialCategory', '2')
        ->where('products.status', 1)
        ->join('markets', 'markets.id', '=', 'products.marketId')
        ->where('products.adminApproval','=','1')->select('products.*', 'markets.name as mName' ,'markets.id as mid')->get();

        $sponseredProducts = products::where('products.sponsered', 1)->where('products.status', 1)->join('markets', 'markets.id', '=', 'products.marketId')->where('products.adminApproval','=','1')->select('products.*', 'markets.name as mName' ,'markets.id as mid')->get();

        return view('website.index')->with('indexbanner',$indexbanner)->with('banner',$banner)->with('slider',$slider)->with('saleProducts', $saleProducts)->with('buyAgain', $buyAgain)->with('seasonProducts', $seasonProducts)->with('featuredProducts', $featuredProducts)->with('caribbeanProducts', $caribbeanProducts)->with('sponseredProducts', $sponseredProducts)->with('beThrifty', $beThrifty);

    }

    public function faq()

    {

        $data = faq::all();

        return view('website.faq', compact('data'));

    }

    public function contact()

    {

        return view('website.contact');

    }

    public function testimonials()

    {

        $data = testimonal::where('status', '1')->get();

        return view('website.testimonials', [

            'data' => $data

        ]);

    }

    public function aboutUs()

    {

        return view('website.aboutUs');

    }


    public function vendor_login(){

        return view('website.vendor.login');

    }


    public function vendor_register(){
        $membershipVendor=membershipVendor::all();
        $countries = DB::table('countries')->get();

        return view('website.vendor.register',compact('countries','membershipVendor'));

    }

    public function forget_pass(){

        return view('website.vendor.forget_pass');

    }
    
        public function get_origin(Request $request){
        $id = $request->id;
        $countries = DB::table('origins')->where('countryId',$id)->get();

        echo json_encode($countries) ;
    }

    public function vendor_logout(){

        Auth::logout();

        Session::flush();

        // Session::flash('success', 'Logout As Vendor Successfully!');

        return redirect()->route('vendor.login')->with('success','Logout As Vendor Successfully!');

    }

    public function CategoryWiseProduct($id)

    {



        $products = products::where('products.categoryId', $id)

            ->join('markets', 'markets.id', '=', 'products.marketId')

            ->select('products.*', 'markets.name as mName')->get();





        $categories = category::where('status', 1)->where('type', 1)->get();



        $product_size = products::where('status', 1)->groupby('size')->get();

        $product_color = products::where('status', 1)->groupby('color')->get();



        $product_brand = brands::where('status', 1)->get();

        // $





        // foreach ($product_color as $ps) {

        //     echo $ps->color;

        // }

        // exit;





        $response = array();

        foreach ($categories as $category) {



            $category->subCat = category::where('parentId', $category->id)->get();

            $response[] = $category;

        }

        $sponseredProducts1 = products::where('products.sponsered', 1)->where('products.status', 1)->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->orderBy('products.id', 'ASC')->get();

        $sponseredProducts2 = products::where('products.sponsered', 1)->where('products.status', 1)->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->orderBy('products.id', 'DESC')->get();

        return view(

            'website.shop',

            [

                'product_size' => $product_size,

                'product_brand' => $product_brand,

                'product_color' => $product_color

            ]

        )->with('products', $products)->with('categories', $response)->with('sponseredProducts1', $sponseredProducts1)->with('sponseredProducts2', $sponseredProducts2);

    }

    public function get_city(Request $request){

        $id = $request->id;

        $countries = DB::table('cities')->where('countryId',$id)->get();



        echo json_encode($countries) ;

    }

    public function terms_agreement(){

        return view('website.vendor.terms_agreement');

    }

    public function vendor__contact_agreement(){

        return view('website.vendor.contact_agreement');

    }

       public function search_ajax(Request $request)
         {
             $typo = '0';
            
             $query = $request->get('search');
             $products = DB::table('products as p')
             
             ->leftjoin('markets as m', 'm.id', '=', 'p.marketId')
             ->where('p.specialCategory', $typo)
             ->where('p.status', 1)         
             ->where('p.name' , 'like' ,'%'.$query.'%')
             ->select('p.*', 'm.name as mName')
             ->get();
     
     
             $categories = category::where('status', 1)->where('type', 1)->get();
     
             $product_size = products::where('status', 1)->groupby('size')->get();
             $product_color = products::where('status', 1)->groupby('color')->get();
     
             $product_brand = brands::where('status', 1)->get();
         
     
     
             $response = array();
             foreach ($categories as $category) {
     
                 $category->subCat = category::where('parentId', $category->id)->get();
                 $response[] = $category;
             }
             $sponseredProducts1 = products::where('products.sponsered', 1)->where('products.status', 1)->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->orderBy('products.id', 'ASC')->get();
             $sponseredProducts2 = products::where('products.sponsered', 1)->where('products.status', 1)->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->orderBy('products.id', 'DESC')->get();
             return view(
                 'websiteLayout.search',
                 [
                     'product_size' => $product_size,
                     'product_brand' => $product_brand,
                     'product_color' => $product_color
                 ]
             )->with('products', $products)->with('categories', $response)->with('sponseredProducts1', $sponseredProducts1)->with('sponseredProducts2', $sponseredProducts2);
         }         
    
    public function member_subscription()
    {
       return view('website.subscription');
    }
    
            
    public function autocomplete(Request $request)
    {
        
        $query = $request->get('search');
         $products = DB::table('products')->where('name' , 'like' ,'%'.$query.'%')->get();
        return response()->json($products);
    }
    
    public function new_product_form(){
        return view('adminPanel.product.new_product_form');
    }

}