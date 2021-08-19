<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorFunction extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Vendor');
    }


    public function index()
    {
        return view('vendorPanel.dashboard');
    }
}
