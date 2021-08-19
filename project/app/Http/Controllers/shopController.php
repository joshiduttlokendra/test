<?php



namespace App\Http\Controllers;



use App\Models\brands;

use Session;

use App\Models\products;

use App\Models\services;

use App\Models\category;

use App\Models\frequentQuestions;
use Illuminate\Support\Facades\Auth;

use App\Models\reviews;

use App\Models\review_like;

use App\Models\review_dislike;

use Illuminate\Http\Request;
use App\Models\address;
use App\Models\city;
use DB;
use App\Models\cartItems;
use App\Models\cart;
use App\Models\country;


class shopController extends Controller

{



    
 public function cart()
    {
   
        $data =0 ;
        $coupons = 0;
        $countries = country::all();
        if (Auth::check())
        {       
            $id = Auth::id();
            $data= DB::table('addresses as a')             
                    ->leftjoin('countries as c', 'c.id', '=', 'a.country')
                    ->leftjoin('cities as cc', 'cc.id', '=', 'a.city') 
                    ->where('a.userId',$id)       
                    ->select('a.*', 'c.name as cname' ,'c.id as cid' , 'cc.id as ccid','cc.name as ccname')
                    ->first();
            $coupons = DB::table('coupons')->where('userId',$id)->get();         
        }
   
  

        $cart = array();
        if (Auth::id()) {
            $cartId = cart::where('userId', Auth::id())->where('status', 1)->first();
            if (isset($cartId->id)) {
                $response = cartItems::where('cartId', $cartId->id)->get()->toArray();


                foreach ($response as $key => $res) {
                    $res['pDetail'] = products::where('products.id', $res['productId'])->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->first();
                    $cart[] = $res;
                }
            }
        } else {
            
            $response = Session::get('cart');

            if ($response == null) {
                return redirect()->back()->with('warning', "Please add some item to cart");
            } else {
                foreach ($response as $key => $res) {
                    $res['pDetail'] = products::where('products.id', $res['productId'])->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->first();
                    $cart[] = $res;
                }
            }
        }

      
   

        return view('website.cart')->with('response', $cart)->with('countries' , $countries)->with('data' , $data)->with('coupons', $coupons);
    }
    public function shop($slug , Request $request)

    {
     $query = $request->get('search');
        $typo = '0';

        if ($slug == 'bethrifty') {

            $typo = '2';

        } elseif ($slug == 'caribbean') {

            $typo = '1';

        } else {

            $typo = '0';

        }
        
        $count = products::count();

        if(!empty($query))
        {
            $products = products::where('products.status', 1)
            ->where('products.specialCategory', $typo)
            ->where('products.name' , 'like' ,'%'.$query.'%')
            ->join('markets', 'markets.id', '=', 'products.marketId')
            ->select('products.*', 'markets.name as mName')
            ->paginate(9);
           $count1 = $products->count();
        }
        else
        {
            $products = products::where('products.status', 1)
            ->where('products.specialCategory', $typo)
    
            ->join('markets', 'markets.id', '=', 'products.marketId')
            ->select('products.*', 'markets.name as mName')
            ->paginate(9);
            $count1 = 9;
           
        }



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

        )->with('count1', $count1)->with('count', $count)->with('products', $products)->with('categories', $response)->with('sponseredProducts1', $sponseredProducts1)->with('sponseredProducts2', $sponseredProducts2);

    }

    public function productDetails($id )

    {

        

            $response = products::where('products.id', $id)
            ->join('markets', 'markets.id', '=', 'products.marketId')
            ->select('products.*', 'markets.name as mName' ,'markets.id as mid')->first();

            

            if ($response->type == 1) {

                $colors = products::where('parentId', $response->id)->get();

            } else {

                $colors = products::where('parentId', $response->parentId)->where('id', '!=', $response->id)->orWhere('id', $response->parentId)->get();

                // $colors[]=products::where('id',$response->parentId)->get();

            }

    

    

    

            $sizes = array();

            if ($response->type == 1) {

                $sizes = products::where('parentId', $response->id)->where('color', $response->color)->get();

            } else {

                $sizes = products::where('parentId', $response->parentId)->where('id', '!=', $response->id)->orWhere('id', $response->parentId)->where('color', $response->color)->get();

                // $colors[]=products::where('id',$response->parentId)->get();

            }



            $reviews = reviews::where('dataId', $id)->where('status',1)->get();

        

            $review_like = review_like::where('product_id',$id)->count();

            $review_dislike = review_dislike::where('product_id',$id)->count();

    

            $frequentQuestion = frequentQuestions::where('dataId', $id)->where('status', 1)->get();

            $totalRatings = count(reviews::where('type', 1)->where('dataId', $id)->get());

    

            $rating5 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 5)->get());

            $rating4 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 4)->get());

            $rating3 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 3)->get());

            $rating2 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 2)->get());

            $rating1 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 1)->get());

            $sponseredProducts = products::where('products.sponsered', 1)->where('products.status', 1)->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->orderBy('products.id', 'ASC')->get();

            $productsRating = products::where('products.status', 1)->join('reviews', 'reviews.dataId', '=', 'products.id')->where('reviews.type', 1)->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->get();

    

        

       

     

        // print_r($sizes);

        // exit;

        // print_r($colors);

        // exit;



        return view('website.productDetails')->with('response', $response)->with('colors', $colors)

        ->with('sizes', $sizes)->with('reviews', $reviews)->with('frequentQuestion', $frequentQuestion)

        ->with('totalRatings', $totalRatings)->with('rating5', $rating5)->with('rating4', $rating4)

        ->with('rating3', $rating4)->with('rating2', $rating2)->with('rating1', $rating1)

        ->with('sponseredProducts', $sponseredProducts)->with('productsRating', $productsRating)

        ->with('review_like', $review_like)->with('review_dislike', $review_dislike);

    }



    public function filter_data(Request $request)

    {

        $input = $request->data;

        if ($request->ajax()) {

            DB::enableQueryLog();

            $products = products::query();



            $min_value = $input['Price']['min_value'];

            $max_value = $input['Price']['max_value'];

            $cat_id = $input['category_id'];

            $new = $input['new'];

            $sorting = $input['sorting'];



            if (isset($input['Size'])) {

                $size = $input['Size'];

            }

            if (isset($input['Color'])) {

                $color = $input['Color'];

            }

            if (isset($input['Brand'])) {

                $brand = $input['Brand'];

            }

            if (isset($input['new'])) {

                $new = $input['new'];

            }

            if (isset($input['sorting'])) {

                $sorting = $input['sorting'];

            }



            if (isset($min_value) && isset($max_value)) {

                $products->whereBetween('price', [$min_value, $max_value])->get();

            }

            if ($cat_id != 0) {

                $products->where('categoryId', $cat_id)->get();

            }



            if (isset($size)) {

                $products->whereIn('size', $size)->get();

            }



            if (isset($color)) {

                $products->whereIn('color', $color)->get();

            }



            if (isset($brand)) {

                $products->whereIn('brandId', $brand)->get();

            }



            if (isset($new)) {

                $products->where('new', $new)->get();

            }





            // <option value="0">No Filter</option>

            // <option value="1">New Releases</option>

            // <option value="2">Popularity</option>

            // <option value="3">Average Rating</option>

            // <option value="4">Relevance</option>

            // <option value="5">Low - Hight Price</option>

            // <option value="6">High - Low Price</option>

            // <option value="7">A - Z Order</option>

            // <option value="8">Z - A Order</option>

            // <option value="9">Size</option>

            // <option value="10">Colour</option>





            if ($sorting == 0) {

                $products = $products->get();

            } elseif ($sorting == 1) {

                $products->where('new', '1')->get();

            } elseif ($sorting == 2) {

                # code...

            } elseif ($sorting == 3) {

                # code...

            } elseif ($sorting == 4) {

                # code...

            } elseif ($sorting == 5) {

                # code...

                $products = $products->orderBy('price', 'ASC')->get();

            } elseif ($sorting == 6) {

                # code...

                $products = $products->orderBy('price', 'DESC')->get();

            } elseif ($sorting == 7) {

                # code...

                $products = $products->orderBy('name', 'ASC')->get();

            } elseif ($sorting == 8) {

                # code...

                $products = $products->orderBy('name', 'DESC')->get();

            } elseif ($sorting == 9) {

                # code...

                $products = $products->orderBy('size', 'ASC')->get();

            } elseif ($sorting == 10) {

                # code...

                $products = $products->orderBy('color', 'ASC')->get();

            } else {

                $products = $products->get();

            }









            // return DB::getQueryLog();

            // exit;



            $prod = view('website.componets.ajaxProducts', ['products' => $products])->render();

        }



        return response()->json(['prod' => $prod]);

    }





    

}