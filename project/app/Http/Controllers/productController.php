<?php



namespace App\Http\Controllers;


use App\Models\membershipShopper;
use App\Models\membershipVendor;
use App\Models\User;
use App\Models\brands;

use App\Models\category;

use App\Models\markets;

use App\Models\products;

use App\Models\reviews;

use App\Models\review_like;

use App\Models\review_dislike;

use App\Models\follow_unfollow_vendor;

use Illuminate\Http\Request;

use Auth;

use DB;



class productController extends Controller

{

    //

    public function addProduct()
    {
        $parent=products::where('type',1)->where('status',1)->get();
        $markets=markets::where('status',1)->get();
        $brands=brands::where('status',1)->get();
        $category=category::where('status',1)->where('c_type', '1')->where('type','0')->get();
        $datas=User::where('status',1)->where('roleId',3)->get();


        return view('adminPanel.product.add')->with('datas',$datas)->with('parent',$parent)->with('markets',$markets)->with('brands',$brands)->with('categories',$category);
    }

   public function insertProduct(request $request)

    {
        // $follower = follow_unfollow_vendor::join('users','follow_unfollow_vendors.follower_id','=','users.id')
        // ->where('follow_unfollow_vendors.follower_id',Auth::user()->id)
        // ->get(['users.email']);
        // dd(Auth::user()->id);

        $input = $request->all();


        if ($request->type == "0") {
            $parent_product = products::where('id', $request->parentId)->first();
            $input['name'] = $parent_product->name;
            $input['marketId'] = $parent_product->marketId;
            $input['categoryId'] = $parent_product->categoryId;
            $input['brandId'] = $parent_product->brandId;
            $input['parentId'] = $parent_product->id;
        }
        if ($request->sale == "0") {
            $input['salePrice'] = "0";
        }
        unset($input['_token']);

        $images = array();

        if ($request->hasFile('imageUrl')) {



            foreach ($request->file('imageUrl') as $file) {

                $name = rand(100,1051326513).time() . 'product.' . $file->getClientOriginalExtension();

                $destinationPath = public_path('/uploads/product');

                $file->move($destinationPath, $name);

                $name = "/uploads/product/" . $name;

                $images[] = $name;
            }
        }

        $input['imageUrl'] = json_encode($images);


        if (Auth::user()->roleId == 1) {

            $input['added_by'] = Auth::user()->id;
            $input['adminApproval'] = '1';
            // $input['adminApproval'] = '1';

            products::where('marketId', $input['marketId'])->update(array('new' => '0'));

            $check = products::insert($input);
            if ($check) {

                session()->flash('message', 'Product Added');
            } else {

                session()->flash('message', 'Product error');
            }

            return back();
        } else {
            $pro_count = products::where('added_by',Auth::user()->id)->count();
            $Membership_pro_count = membershipVendor::where('id',Auth::user()->membershipShopperId)->get('productLimit');

               if($pro_count > $Membership_pro_count[0]->productLimit){
                   session()->flash('message', 'Please Upgrade Your Plan');
                  return back();
               }
              
            $input['added_by'] = Auth::user()->id;
            $input['adminApproval'] = '0';


            products::where('marketId', $input['marketId'])->update(array('new' => '0'));

            $check = products::insert($input);
            if ($check) {

                session()->flash('message', 'Product Added');
            } else {

                session()->flash('message', 'Product error');
            }
            return back();
        }
    }


     public function viewProducts(request $request)
    {
        // $data=products::join('brands','brands.id','=','products.brandId')
        // ->join('categories','categories.id','=','products.categoryId')
        // ->join('markets','markets.id','=','products.marketId')
        // ->join('users','users.id','=','products.vendorId')
        // ->select('products.*','users.name as vendorName','brands.name as brandName','categories.name as categoryName','markets.name as marketName')->get();
        // $response=array();
        // foreach ($data as $key=>$dt)
        // {
        //     $response[$key]=$dt;
        //     if($dt->type == 1)
        //     {
        //         $response[$key]->parentName='Null';
        //     }
        //     else
        //     {
        //         $response[$key]->parentName=products::where('id',$dt->parentId)->first()->name;
        //     }
        // }
        // return view('adminPanel.product.view')->with('response',$response);
        // nikhil 23-7-2021
          if (Auth::user()->roleId == 1) {

            $data = products::join('brands', 'brands.id', '=', 'products.brandId')

                ->join('categories', 'categories.id', '=', 'products.categoryId')

                ->join('markets', 'markets.id', '=', 'products.marketId')

                ->select('products.*', 'brands.name as brandName', 'categories.name as categoryName', 'markets.name as marketName')
                ->where("products.type", "1")

                ->get();

            $response = array();

            foreach ($data as $key => $dt) {

                $response[$key] = $dt;

                if ($dt->type == 1) {

                    $response[$key]->parentName = 'Null';
                } else {

                    // echo json_encode($response[$key]['name']);exit;



                    // $response[$key]->parentName=products::where('id',$dt->parentId)->first()->name;

                    $response[$key]->parentName = products::where('id', $dt->parentId)->first();

                    // print_r( $response[$key]);exit;

                }
            }

            return view('adminPanel.product.view')->with('response', $response);
        } else if (Auth::user()->roleId == 2) {

            //    return Auth::user()->id;

            $data = products::join('brands', 'brands.id', '=', 'products.brandId')

                ->join('categories', 'categories.id', '=', 'products.categoryId')

                ->join('markets', 'markets.id', '=', 'products.marketId')

                ->where('products.added_by', Auth::user()->id)
                ->where("products.type", "1")


                // ->select('products.*', 'brands.name as brandName', 'categories.name as categoryName', 'markets.name as marketName')

                ->get(['products.*', 'brands.name as brandName', 'categories.name as categoryName', 'markets.name as marketName']);

            // echo json_encode($data[0]);

            // exit;

            $response = array();

            foreach ($data as $key => $dt) {

                $response[$key] = $dt;

                if ($dt->type == 1) {

                    $response[$key]->parentName = 'Null';
                } else {

                    // echo json_encode($response[$key]['name']);exit;



                    // $response[$key]->parentName=products::where('id',$dt->parentId)->first()->name;

                    $response[$key]->parentName = products::where('id', $dt->parentId)->first();

                    // print_r( $response[$key]);exit;

                }
            }

            return view('adminPanel.product.view')->with('response', $response);
        }
    }
    
    // nikhil 23-7-2021
    public function editProduct(Request $request, $id)
    {

        if (Auth::user()->roleId == 1) {

            $mainProduct = products::where('id', $id)->first();
            $childProduct = products::where('parentId', $id)->get();
            $brands_product = brands::where('id', $mainProduct->brandId)->first();
            $category_product = category::where('id', $mainProduct->categoryId)->first();



            $parent = products::where('type', 1)->where('status', 1)->get();

            $markets = markets::where('status', 1)->get();

            $brands = brands::where('status', 1)->get();

            $category = category::where('status', 1)->where('c_type', '1')->where('type', '0')->get();




            return view(
                'adminPanel.product.edit',
                [
                    'mainProduct' => $mainProduct,
                    'childProduct' => $childProduct,
                    'brands_product' => $brands_product,
                    'category_product' => $category_product,

                    'parent' => $parent,
                    'markets' => $markets,
                    'brands' => $brands,
                    'categories' => $category



                ]
            );
        } else if (Auth::user()->roleId == 2) {


            $mainProduct = products::where('id', $id)->first();
            $childProduct = products::where('parentId', $id)->get();
            $brands_product = brands::where('id', $mainProduct->brandId)->first();
            $category_product = category::where('id', $mainProduct->categoryId)->first();

            $parent = products::where('type', 1)->where('status', 1)->get();

            $markets = markets::where('status', 1)->get();

            $brands = brands::where('status', 1)->get();

            $category = category::where('status', 1)->where('c_type', '1')->where('type', '0')->get();




            return view(
                'adminPanel.product.edit',
                [
                    'mainProduct' => $mainProduct,
                    'childProduct' => $childProduct,
                    'brands_product' => $brands_product,
                    'category_product' => $category_product,

                    'parent' => $parent,
                    'markets' => $markets,
                    'brands' => $brands,
                    'categories' => $category



                ]
            );
        }
    }
    // end

    public function deleteProduct($id)

    {

        products::where('id', $id)->delete();

        session()->flash('message', 'Product Deleted');

        return back();

    }

    public function reviewSubmit(request $request)

    {

        $input = $request->all();

        $id = $request->dataId;

        if (Auth::id()) {

            $uid =   Auth::id();

            $data = DB::table('orders')->where('userId', $uid)->where('cartId', $id)->get();

        }else{
            session()->flash('error', 'Please Login First');
            return back();
        }

        if (!empty($data)) {

            unset($input['_token']);





            $file = $request->file('imageUrl');

            $name = time() . 'reivew.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('/uploads/review/');

            $file->move($destinationPath, $name);

            $name = "/uploads/review/" . $name;

            $input['imageUrl'] = $name;



            $images = array();

            if ($request->hasFile('reviewImages')) {

                foreach ($request->file('reviewImages') as $file) {

                    $name = time() . 'reivew.' . $file->getClientOriginalExtension();

                    $destinationPath = public_path('/uploads/review');

                    $file->move($destinationPath, $name);

                    $name = "/uploads/review/" . $name;

                    $images[] = $name;

                }

                $input['reviewImages'] = json_encode($images);

            }





            reviews::insert($input);
            session()->flash('success', 'Your review is submited it will show after admin approvel');
            return back();

        } else {
            session()->flash('error', 'You have to buy Product first');
            return back();

        }

    }

    public function reviewLike(Request $request)

    {

        // print_r( $request->all());exit;

        $review_id = $request->check;

        $product_id = $request->pro_id;



        $userId = Auth::user()->id;



        if (Auth::id()) {

            $uid =   Auth::id();

            $data = DB::table('orders')->where('userId', $uid)->where('cartId', $product_id)->get();

            if (!empty($data)) {

                $like = $request->like;

                $check = review_like::Where(['review_id' => $review_id, 'user_id' => $userId])->first();

                if ($check === null) {

                    $like = new review_like;

                    $like->review_id = $review_id;

                    $like->user_id = $userId;

                    $like->product_id = $product_id;



                    if ($like->save()) {

                        $count = review_like::Where(['review_id' => $review_id])->count();



                        $data['response'] = true;

                        $data['message'] = "Liked";

                        $data['count'] = $count;

                    } else {

                        $data['response'] = false;

                        $data['message'] = "Something Wrong like unsuccessfull";

                    }

                } else {

                    // echo $check->id;exit;

                    $delete = review_like::where(['id' => $check->id])->delete();

                    if ($delete) {

                        $count = review_like::Where(['review_id' => $review_id])->count();

                        $data['response'] = true;

                        $data['message'] = "UnLiked";

                        $data['count'] = $count;

                    } else {

                        $data['response'] = false;

                        $data['message'] = "Something Wrong UnLiked unsuccessfull";

                    }

                    //    echo json_decode($data);



                }



                echo json_encode($data);

            }

        }

    }



    public function reviewDislike(Request $request)

    {

        // print_r($request->all());exit;

        $review_id = $request->check;

        $product_id = $request->pro_id;

        $userId = Auth::user()->id;

        if (Auth::id()) {

            $uid =   Auth::id();

            $data = DB::table('orders')->where('userId', $uid)->where('cartId', $product_id)->get();

        }



        if (!empty($data)) {

            $like = $request->like;

            $check = review_dislike::Where(['review_id' => $review_id, 'user_id' => $userId])->first();

            if ($check === null) {

                $like = new review_dislike;

                $like->review_id = $review_id;

                $like->user_id = $userId;

                $like->product_id = $product_id;

                if ($like->save()) {

                    $count = review_dislike::Where(['review_id' => $review_id])->count();



                    $data['response'] = true;

                    $data['message'] = "disLiked";

                    $data['count'] = $count;

                } else {

                    $data['response'] = false;

                    $data['message'] = "Something Wrong like unsuccessfull";

                }

            } else {

                // echo $check->id;exit;

                $delete = review_dislike::where(['id' => $check->id])->delete();

                if ($delete) {

                    $count = review_dislike::Where(['review_id' => $review_id])->count();

                    $data['response'] = true;

                    $data['message'] = "disLiked removed";

                    $data['count'] = $count;

                } else {

                    $data['response'] = false;

                    $data['message'] = "Something Wrong UnLiked unsuccessfull";

                }

                //    echo json_decode($data);



            }



            echo json_encode($data);

        }

    }

    //=========== nikhil === 05/07/2021

   public function Product_Approve_Request()

   {

    $data=products::join('brands', 'brands.id', '=', 'products.brandId')

    ->join('categories', 'categories.id', '=', 'products.categoryId')

    ->join('markets', 'markets.id', '=', 'products.marketId')

    ->where('products.adminApproval','0')

    ->select('products.*', 'brands.name as brandName', 'categories.name as categoryName', 'markets.name as marketName')->get();

    // print_r($data);

    // return view('adminPanel.product.pro_aprove_req',compact('data'));

    $response=array();

    foreach ($data as $key=>$dt) {

        $response[$key]=$dt;

        if ($dt->type == 1) {

            $response[$key]->parentName='Null';

        } else {

            // echo json_encode($response[$key]['name']);exit;



            // $response[$key]->parentName=products::where('id',$dt->parentId)->first()->name;

            $response[$key]->parentName=products::where('id', $dt->parentId)->first();

            // print_r( $response[$key]);exit;

        }

    }

    return view('adminPanel.product.pro_aprove_req')->with('response', $response);

   }

   public function approve_Product($id)

   {

    $approve = products::where('id',$id)->update(['adminApproval'=>'1']);

    if($approve){

        session()->flash('message', 'Product Approved');

        return back();

    }else{

        session()->flash('error', 'Product Deleted');

        return back();

    }

   }
   public function newReview_for_approve()
   {
    //    $newReview = reviews::where('status',0)->get(); 
       $newReview = reviews::join('products', 'products.id', '=', 'reviews.dataId')
       ->where('reviews.status',0)
               ->get(['reviews.*', 'products.name as pro_name','products.price as pro_price']);
            //    print_r($newReview);
       return view('adminPanel.product.new_review')->with('newReview',$newReview);
   }
   public function approve_newReview($id)
   {
       $update = reviews::where('id',$id)->update(['status'=>'1']);
       session()->flash('message', 'Review Approved');
       return back();

   }
   public function All_Review()
   {
   
      $allReview = reviews::join('products', 'products.id', '=', 'reviews.dataId')
      ->where('reviews.status',1)
              ->get(['reviews.*', 'products.name as pro_name','products.price as pro_price']);
           //    print_r($newReview);
      return view('adminPanel.product.approve_review')->with('allReview',$allReview);

   }

}