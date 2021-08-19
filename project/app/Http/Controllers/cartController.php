<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cartItems;
use DB;
use App\Models\products;
use App\Models\setting;
use App\Models\wishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Input;
use App\Models\country;
use App\Models\address;
use App\Models\city;

class cartController extends Controller
{
    
    

    public function addToCart(Request $request)
    {
       
        if (empty($request->type) || empty($request->quantity)) {
            $request->type = "0";
           
            $request->quantity = 1;
        }
        if(empty($request->size)){
            $request->size = "service";
        }
        $msg = "Added to the cart";
        if (Auth::user()) {

            $cartId = cart::where('userId', Auth::id())->where('status', 1)->first();
            if (isset($cartId->id)) {
                $cart = cartItems::where('productId', $request->id)->where('type', $request->type)->where('size', $request->size)->where('cartId', $cartId->id)->first();

                if (isset($cart->id)) {
                 
                    $newQuantity = $request->quantity+$cart->quantity;
                    cartItems::where('id', $cart->id)->update(array('quantity' => $newQuantity));
                    
                    $msg = "Cart Updated";
                } else {
                  
                    $cartIttem = new cartItems();
                    $cartIttem->cartId = $cartId->id;
                    $cartIttem->productId = $request->id;
                    $cartIttem->type = $request->type;
                    $cartIttem->size = $request->size;
                    $cartIttem->quantity = $request->quantity;
                    $cartIttem->save();
              
                    $msg = "Added to the cart";
                }
            } else {
                $cart = new cart();
                $cart->userId = Auth::id();
                $cart->status = 1;
                $cart->save();

                $cartIttem = new cartItems();
                $cartIttem->cartId = $cart->id;
                $cartIttem->productId = $request->id;
                $cartIttem->type = $request->type;
                $cartIttem->size = $request->size;
                $cartIttem->quantity = $request->quantity;
                $cartIttem->save();
                $msg = "Added to the cart";
            }
        } else {

            $cart = (array)Session::get('cart');

            $i = 0;
            foreach ($cart as $key => $item) {
                $i++;
                if ($item['productId'] == $request->id && $item['size'] == $request->size) {
                    $msg = "Cart Updated";
                    $item['quantity'] = $item['quantity'] + $request->quantity;
                    $cart[$key] = $item;
                }
            }
            ++$i;
            if ($msg == 'Added to the cart') {
                $cart[$i]['productId'] = $request->id;
                $cart[$i]['type'] = $request->type;
                $cart[$i]['quantity'] = $request->quantity;
                $cart[$i]['size'] = $request->size;
                $cart[$i]['color'] = $request->color;
                $cart[$i]['gift'] = '0';
            }
            Session::put('cart', $cart);
        }

        return response()->json($msg);
    }

   
       public function removeFromCart(request $request)
    {

        if (Auth::user()) {
            $cartId = cart::where('userId', Auth::id())->where('status', 1)->first();

            cartItems::where('cartId', $cartId->id)->where('productId', $request->itemId)->where('type', $request->divType)->where('size', $request->divSize)->delete();
        } else {
            $cart = (array)Session::get('cart');
            
            foreach ($cart as $key => $item) {
                if ($item['productId'] == $request->itemId && $item['size'] == $request->divSize && $item['type'] == $request->divType) {
                    unset($cart[$key]);
                }
            }    Session::put('cart', $cart);
        }


        return response()->json('done');
    }



    public function  removeForWishlist(Request $request)
    {
        if (Auth::user()) {
            $cartId = cart::where('userId', Auth::id())->where('status', 1)->first();
            $cartIttem = new wishList();
            $cartIttem->userId = Auth::id();
            $cartIttem->productId = $request->itemId;
            $cartIttem->type = $request->divType;                         
            $cartIttem->save();
            
               
            cartItems::where('cartId', $cartId->id)->where('productId', $request->itemId)->where('type', $request->divType)->where('size', $request->divSize)->delete();
        } else {

             (array)Session::get('wishList');
            $cart = (array)Session::get('cart');
       
            session::put('wishList',$cart);
            foreach ($cart as $key => $item) {
                if ($item['productId'] == $request->itemId && $item['size'] == $request->divSize && $item['type'] == $request->divType) {
                    unset($cart[$key]);
                }
            }    Session::put('cart', $cart);
        }


        return response()->json('Remove from cart');
    }
     public function updateCart(request $request)
    {
     
        if (Auth::user()) {
            $cartId = cart::where('userId', Auth::id())->where('status', 1)->first();
            $ddddddddd = cartItems::where('cartId', $cartId->id)
            ->where('productId', $request->pid)->where('type', $request->type)
            ->where('size', $request->size)
            ->update(array('quantity' => $request->quantity, 'gift' => $request->giftId));
            if ($request->purchaseLater == 1) {
                cartItems::where('cartId', $cartId->id)->where('productId', $request->pid)->where('type', $request->type)->where('size', $request->size)->delete();
            }
            // $total = cartItems::where('cartId', $cartId->id)->sum('price');
            // print_r(DB::getQueryLog());
        } else {
            $cart = (array)Session::get('cart');
            foreach ($cart as $key => $item) {
                if ($item['productId'] == $request->pid && $item['size'] == $request->size && $item['type'] == $request->type) {
                    $item['quantity'] = $request->quantity;
                    $item['gift'] = $request->giftId;
                    $cart[$key] = $item;
                    if ($request->purchaseLater == 1) {
                        unset($cart[$key]);
                    }
                }
            }

            Session::put('cart', $cart);
        }


        return response()->json('done');
    }
    public function checkout($id = 0)
    {
        $cart = array();
        $buy = array();
        $countries = DB::table('countries')->get();
        if ($id == 0) {


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
        } else {
            $res['pDetail'] = products::where('products.id', $id)->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->first();
            $buy[] = $res;


            $res['sDetail'] = DB::table('services as s')
                ->leftjoin('markets as m', 'm.id', '=', 's.marketId')
                ->select('s.*', 'm.name as mName')
                ->where('s.id', $id)
                ->first();
            $buy1[] = $res;
        }


        $cod = setting::where('key', 'cashOnDelivery')->first()->value;
        $paypal = setting::where('key', 'paypal')->first()->value;

        return view('website.checkout')->with('countries', $countries)->with('cart', $cart)->with('buy', $buy)->with('cod', $cod)->with('paypal', $paypal);
    }
    public function additionalComment(request $request)
    {
        Session::put('AdditionalComment', $request->comment);
    }
    public function cityByCountry(request $request)
    {
        $cities = DB::table('cities')->where('countryId', $request->countryId)->get();
        return response()->json($cities);
    }

    public function addToWishList(Request $request)
    {
        
      
        $request->type;
        
            if($request->type==1)
            {
              $request->type=1; 
             
              $msg = "Added to the wishlist";
              if (Auth::user()) {           
                $check = wishList::where(['userId'=>Auth::id(),'productId'=>$request->id])->first();
                         if (empty($check)) {
                             $cartIttem = new wishList();
                             $cartIttem->userId = Auth::id();
                             $cartIttem->productId = $request->id;
                             $cartIttem->type = $request->type;
                             //  nikhil 22-07-2021
                               $cartIttem->quantity = $request->quantity;
                               $cartIttem->price = $request->price;
                             // end
                             $cartIttem->save();
                             $msg = "Added to the wishlist";
                         }
                          else{
                              $msg = "You Already have this item in wishlist";
                          }
                    }
                    else {
           
                $wishlist = (array)Session::get('wishList');
    
                $i = 0;
                foreach ($wishlist as $key => $item) {
                    $i++;
                    if ($item['productId'] == $request->id) {
                        $msg = "WishList Updated";
                        $item['quantity'] = $request->quantity;
                        $wishlist[$key] = $item;
                    }
                }
                ++$i;
                if ($msg == 'Added to the wishlist') {
                    $wishlist[$i]['productId'] = $request->id;
                   
                    $wishlist[$i]['quantity'] = $request->quantity;
                   
                }
                Session::put('wishList', $wishlist);
            }
            
              return response()->json($msg);
            }
    }
    
  public function removeFromWishlist(request $request)
    {

        if (Auth::user()) {
            $cartId = wishList::where('userId', Auth::id())->delete();

       } 
       else {
            $cart = (array)Session::get('wishList');
        // dd($cart);
            foreach ($cart as $key => $item) {
                if ($item['productId'] == $request->itemId) {
                    unset($cart[$key]);
                }
            }    Session::put('wishList', $cart);
        }


        return response()->json('Remove from wishList');
    }
    public function wishList()
    {
   
        $cart1 = array();
        
        if (Auth::id()) {
            

            $response = wishList::where('userId', Auth::id())->get()->toArray();


            foreach ($response as $key => $res) {
                $res['pDetail'] = products::where('products.id', $res['productId'])->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->first();
                // $cart1[] = $res;
                $cart1[] =  $res;
            }
            // dd($cart1 );
           

        } else {
           
             
            $response = Session::get('wishList');
         //  dd($response);
         
            if ($response == null) {
                return redirect()->back()->with('warning', "Please add some item to wishlist");
            } else {

                foreach ($response as $key => $res) {
                    $res['pDetail'] = products::where('products.id', $res['productId'])->join('markets', 'markets.id', '=', 'products.marketId')->select('products.*', 'markets.name as mName')->first();
                    $cart1[] = $res;
                  
                }

        } 
    
      
    }

    return view('website.user.wishList')->with('response', $cart1);
}

}