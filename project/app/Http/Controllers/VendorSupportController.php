<?php



namespace App\Http\Controllers;


use App\Models\VendorSupport;

use Illuminate\Http\Request;

use Auth;



class VendorSupportController extends Controller

{

    public function VenderSuportReq(Request $request)
    {   
        $input = $request->all();
        // dd($request->all());
        $enquery = new VendorSupport;
        $enquery->name = $input['name'];
        $enquery->user_id = $input['user_id'];
        $enquery->email = $input['email'];
        $enquery->message = $input['message'];
        $enquery->vendor_id = $input['vendor_id'];
        $save = $enquery->save();
        if($save){
            $request->session()->flash('success', 'Enquery Submited');
            return back();
        }else{
            $request->session()->flash('error', 'Enquery Not Submited');
            return back(); 
        }
    } 

    public function ShowSupportReq(Type $var = null)
    {
       $allRequest = VendorSupport::all();

    }

}