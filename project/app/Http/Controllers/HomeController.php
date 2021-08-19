<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        // print_r(Auth::user());
        // exit;
        if(Auth::user()->hasRole('Admin')){
            return redirect()->route('admin_dashboard');
        }
        if(Auth::user()->hasRole('Vendor')){
            return redirect()->route('vender_dashboard');
        }
    }

    public function index1($id)
    { 
        return view('home');
    }

    public function allmessage()
    { 
        return view('allmessage');
    }
    function jsonResponse(){
        $user = DB::table('chats')->get();
        return response()->json($user);
    }
}
