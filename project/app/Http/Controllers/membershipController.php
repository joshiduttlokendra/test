<?php



namespace App\Http\Controllers;



use App\Models\membership;

use App\Models\membershipShopper;

use App\Models\membershipVendor;

use Illuminate\Http\Request;



class membershipController extends Controller

{

    //

    public function addMembershipVendor()

    {

        return view('adminPanel.membership.vendor.add');

    }

    public function insertMembershipVendor(request $request)

    {

        $input=$request->all();

        unset($input['_token']);

        membershipVendor::insert($input);

        session()->flash('message', 'Membership Created');

        return back();

    }

    public function viewMembershipVendor()

    {

        $response=membershipVendor::all();

        return view('adminPanel.membership.vendor.view')->with('response',$response);

    }

    public function deleteMembershipVendor($id)

    {

        membership::where('id',$id)->delete();

        session()->flash('message', 'Membership Deleted');

        return back();

    }

    public function addMembershipShopper()

    {

        return view('adminPanel.membership.shopper.add');

    }

    public function insertMembershipShopper(request $request)

    {

        $input=$request->all();

        unset($input['_token']);

        membershipShopper::insert($input);

        session()->flash('message', 'Membership Created');

        return back();

    }

    public function viewMembershipShopper()

    {

        $response=membershipShopper::all();

        return view('adminPanel.membership.shopper.view')->with('response',$response);

    }

    public function deleteMembershipShopper($id)

    {

        membership::where('id',$id)->delete();

        session()->flash('message', 'Membership Deleted');

        return back();

    }

    public function membershipVender_details(Request $request)
    {   $id = $request->id;
        $membershipVendor_detail = membershipVendor::where('id',$id)->get();
     echo   json_encode($membershipVendor_detail);
    //    return $request->all();
    }
    public function membershipShopper_details(Request $request)
    {   $id = $request->id;
        $membershipShopper_detail = membershipShopper::where('id',$id)->get();
     echo   json_encode($membershipShopper_detail);
    //    return $request->all();
    }

}

