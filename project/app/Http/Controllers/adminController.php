<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\products;
use App\Models\order;
use App\Models\User;
class adminController extends Controller
{

    //
    public function adminLogin(request $request)
    {

        return view('adminPanel.admin.login');
    }
    public function loginProcess(request $request)
    {
        $input = $request->all();

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {

            if (Auth::user()->roleId == 1) {
              
                $product = products::count();
                $order = order::count();
                $user = User::count();
                return view('adminPanel.index')->with('product',$product)
                ->with('order',$order)->with('user',$user);
            } else {
               
                Auth::logout();
                session()->flash('message', 'Credentials Does not matched');
                return back();
            }
            // put Device Types in session

        } else {
 
            session()->flash('message', 'Credentials Does not matched');
            return back();
        }
    }

    public function editProfile()
    {
        $data = Admin::all();
        return view('adminPanel.editProfile')->with('data', $data);
    }

    public function updateProfile(request $request)
    {

        if ($request->get('password') != "") {
            $hashedPassword = Hash::make($request->get('password'));
            Admin::where('id', '1')->update(array('username' => $request->get('username'), 'email' => $request->get('email'), 'password' => $hashedPassword));
            session()->flash('message', "Profile Updated");
            return back();
        } else {
            Admin::where('id', '1')->update(array('username' => $request->get('username'), 'email' => $request->get('email')));
            session()->flash('message', "Profile Updated");
            return back();
        }
    }
}