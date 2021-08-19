<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\indexbanner;

class IndexbannerController extends Controller
{
  
    public function viewIndexBanner(request $request)
    {
        $response = indexbanner::all();

        return view('adminPanel.indexbanner.view')->with('response',$response);
    }
    public function deleteIndexBanner($id)
    {
         indexbanner::where('id',$id)->delete();
        session()->flash('message', 'Banner Deleted');
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createIndexBanner()
    {
        return view('adminPanel.indexbanner.add');
    }


    public function insertIndexBanner(Request $request)
    {
        $input = $request->all();
     
  
            
        
        unset($input['_token']);
         indexbanner::insert($input);
        session()->flash('message', 'Banner Created');
        return back();



    }
 
    public function editIndexBanner($id)
    {
        $response = indexbanner::find($id);
        return view('adminPanel.indexbanner.edit', compact('response'));
    }


    public function updateIndexBanner(Request $request, $id)
    {
        $input = $request->all();

        unset($input['_token']);
        $data =  indexbanner::find($id);
        $data->content =  $request->get('content');
     
        $data->save();
        session()->flash('message', 'Banner Updated');
        return back();
    }


 
   
}
