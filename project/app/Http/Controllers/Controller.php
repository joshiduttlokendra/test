<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\cartItems;
use App\Models\category;
use App\Models\products;
use App\Models\reviews;
use App\Models\wishList;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function categories()
    {
        $categories = category::where('status', 1)->where('type', 1)->get();
        $response = array();
        $i = 1;
        $j = 0;
        foreach ($categories as $category) {

            $category->subCat = category::where('parentId', $category->id)->get();
            $response[$j][] = $category;
            if ($i % 3 == 0) {
                $j++;
            }
            ++$i;
        }
        return $response;
    }
    public static function sales($id)
    {
        $salesProduct = count(cart::where('carts.status', 0)->join('cart_items', 'carts.id', '=', 'cart_items.cartId')->where('cart_items.productId', $id)->get());
        return $salesProduct;
    }
    public static function rating($id)
    {
        $rating5 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 5)->get());
        $rating4 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 4)->get());
        $rating3 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 3)->get());
        $rating2 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 2)->get());
        $rating1 = count(reviews::where('type', 1)->where('dataId', $id)->where('rating', 1)->get());
        if (count(reviews::where('type', 1)->where('dataId', $id)->get()) == 0) {
            $oRating = 0;
        } else {
            $oRating = (5 * $rating5 + 4 * $rating4 + 3 * $rating3 + 2 * $rating2 + 1 * $rating1) / ($rating5 + $rating4 + $rating3 + $rating2 + $rating1);
        }

        return $oRating;
    }
    public static function marketSales($id)
    {
        $salesNarket = count(cart::where('carts.status', '0')->join('cart_items', 'carts.id', '=', 'cart_items.cartId')->join('products', 'products.id', '=', 'cart_items.productId')->join('markets', 'products.marketId', '=', 'markets.id')->where('markets.id', $id)->get());
        return $salesNarket;
    }
    public static function cartItems()
    {
      if(Auth::check())
      {
          
      }  
        $cart = cart::where('status', 1)->where('userId',Auth::id())->first();
        
        if(isset($cart->id))
        {
            $cartItems= cartItems::where('cartId',$cart->id)->sum('quantity');
      
          
            return $cartItems;

            $cartItems= cartItems::where('cartId',$cart->id)->get();
            return count($cartItems);
       }
       
      else
      {
        $cart= (array)Session::get('cart');
        $total=0;
        // print_r($cart);
        // exit;
        foreach($cart as $item)
        {
           $total += $item['quantity'];
        }
        return $total;
      } 
    }
    public static function cartPrice()
    {
        if (Auth::id()) {

            $cart = cart::where('status', 1)->where('userId', Auth::id())->first();
            if (isset($cart->id)) {
                $cartItems = cartItems::where('cartId', $cart->id)->get();
                $total = 0;
                foreach ($cartItems as $item) {
                    if ($item->type == 1) {
                        if (products::where('id', $item->productId)->first()->sale == 1) {
                            $total += $item->quantity * products::where('id', $item->productId)->first()->salePrice;
                        } else {
                            $total += $item->quantity * products::where('id', $item->productId)->first()->price;
                        }
                    }
                }
                return $total;
            } else {
                return 0;
            }
        } else {
            $cart = (array)Session::get('cart');
            $total = 0;
            foreach ($cart as $item) {
                if ($item['type'] == 1) {
                    if (products::where('id', $item['productId'])->first()->sale == 1) {
                        $total += $item['quantity'] * products::where('id', $item['productId'])->first()->salePrice;
                    } else {
                        $total += $item['quantity'] * products::where('id', $item['productId'])->first()->price;
                    }
                }
            }
            return $total;
        }
    }
    
    
    
    public static function wishlistItems()
    {
    
      if(Auth::check())
        {
            

            $total = wishList::where('userId',Auth::id())->sum('quantity');
            return $total;
        }
 
      else
      {
               
        $cart= (array)Session::get('wishList');
        $total=0;

       if($cart==null)
       {
           return 0;
       }
       else
       {
           foreach($cart as $item)
            {
               $total += $item['quantity'];
            }
        
        return $total;  
       }
      
      } 
            
        


    }

}