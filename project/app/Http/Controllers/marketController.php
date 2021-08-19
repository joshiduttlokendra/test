<?php



namespace App\Http\Controllers;



use App\Models\category;

use App\Models\markets;

use App\Models\products;

use App\Models\User;
use App\Models\follow_unfollow_vendor;

use Illuminate\Http\Request;

use Auth;



class marketController extends Controller

{

    //

    public function createMarket()
    {

        // dd(Auth::user());
        // if(Auth::user()->roleId==1){
        $vendors=User::where('roleId',2)->where('status',1)->get();
        return view('adminPanel.market.add')->with('vendors',$vendors);
        // }
        // return view('adminPanel.market.add');
    }

   public function insertMarket (request $request)
    {
        $input=$request->all();
        $file=$request->file('imageUrl');
        $name=$file->getClientOriginalName();
        $file->move('uploads/product/',$name);
        $images=$name;
         $input['imageUrl']='uploads/product/'.$images;
       
        $file2=$request->file('icon'); 
        $name2=$file2->getClientOriginalName();
        $file2->move('uploads/vendorbanner/',$name2);
        $images2=$name2;
        $input['icon']='uploads/vendorbanner/'.$images2;
    
        $file1=$request->file('banner');
        $name1=$file1->getClientOriginalName();
        $file1->move('uploads/vendorbanner/',$name1);
        
        $images1=$name1;

        $input['banner']='uploads/vendorbanner/'.$images1;
    
    
    
     
        unset($input['_token']);
        markets::insert($input);
        session()->flash('message', 'Market Created');
        return back();
    }
    public function viewMarkets(request $request)

    {

        if(Auth::user()->roleId==1){

            $response=markets::join('users','markets.vendorId','=','users.id')->select('markets.*','users.name as vendorName')->get();



        }

        else if(Auth::user()->roleId== 2){

        $response=markets::join('users','markets.vendorId','=','users.id')

        ->where('markets.added_by',Auth::user()->id)

        ->get(['markets.*','users.name as vendorName']);



        }

        return view('adminPanel.market.view')->with('response',$response);

    }

    public function deleteMarket($id)

    {

        markets::where('id',$id)->delete();

        session()->flash('message', 'Market Deleted');

        return back();

    }

    public function vendor()

    {

        $response=markets::where('status',1)->simplePaginate(8);

        $countMarkets=count(markets::where('status',1)->get());

        return view('website.vendor')->with('response',$response)->with('countMarkets',$countMarkets);

    }


    public function searchResult(Request $request)

    {

        $response=markets::where('status',1)->where('name', 'like', '%' . $request->search . '%')->simplePaginate(8);

        $countMarkets=count(markets::where('status',1)->get());

        return view('website.vendor')->with('response',$response)->with('countMarkets',$countMarkets);

    }

    public function miniStore($id)

    {

        $marketData=markets::where('markets.id',$id)->join('users','users.id','=','markets.vendorId')->select('markets.*','users.name as userName','users.imageUrl as userImg')->first();

        // $products=products::where('marketId',$id)->where('status',1)->orderBy('id','DESC')->get();

        $saleProducts=products::where('products.marketId',$id)->where('products.status',1)->orderBy('products.id','DESC')->where('products.sale',1)->where('products.status',1)->join('markets','markets.id','=','products.marketId')->where('products.adminApproval','=','1')->select('products.*','markets.name as mName')->limit(3)->get();

        $products=products::where('products.marketId',$id)->where('products.status',1)->orderBy('products.id','DESC')->where('products.status',1)->join('markets','markets.id','=','products.marketId')->where('products.adminApproval','=','1')->select('products.*','markets.name as mName')->limit(3)->get();

        $productsAll=products::where('products.marketId',$id)->where('products.status',1)->orderBy('products.id','DESC')->where('products.status',1)->join('markets','markets.id','=','products.marketId')->where('products.adminApproval','=','1')->select('products.*','markets.name as mName')->get();

        $categories=json_decode($marketData->categories);
        
        $cateGory=array();

        // dd(gettype($categories));

        if ($categories != "1") {

            foreach ($categories as $cat) {

                $cateGory[]=category::where('id', $cat)->first();

            }

        }

        return view('website.miniStore')->with('marketData',$marketData)->with('products',$products)->with('cateGory',$cateGory)->with('saleProducts',$saleProducts)->with('productsAll',$productsAll);

    }

}