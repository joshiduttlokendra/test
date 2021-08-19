<?php

namespace App\Http\Controllers;

use App\Models\brands;
use App\Models\category;
use Illuminate\Http\Request;

class brandController extends Controller
{
    //
    public function createBrand()
    {
        return view('adminPanel.brand.add');
    }
    public function insertBrand (request $request)
    {
        $input=$request->all();
        unset($input['_token']);

        brands::insert($input);
        session()->flash('message', 'Brand Created');
        return back();
    }
    public function viewBrands(request $request)
    {
        $response=brands::all();

        return view('adminPanel.brand.view')->with('response',$response);
    }
    public function deleteBrand($id)
    {
        brands::where('id',$id)->delete();
        session()->flash('message', 'Brand Deleted');
        return back();
    }
}
