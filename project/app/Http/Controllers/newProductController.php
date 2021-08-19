<?php 
namespace App\Http\Controllers;


use App\Models\membershipShopper;
use App\Models\membershipVendor;
use App\Models\User;
use App\Models\brands;

use App\Models\category;

use App\Models\markets;

use App\Models\newProducts;

use App\Models\reviews;

use App\Models\review_like;

use App\Models\review_dislike;

use App\Models\follow_unfollow_vendor;

use Illuminate\Http\Request;

use Auth;

use DB;

class newProductController extends Controller

{

public function newProduct(Request $request){
   $input= $request->all();
   dd($input);

    // $ob=$request->post('conImgformData');
    
  return  response()->json($input);
  
    


}

}