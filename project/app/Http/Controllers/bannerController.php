<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\banner;

class bannerController extends Controller
{
  
    public function viewBanner(request $request)
    {
        $response=banner::all();

        return view('adminPanel.banner.view')->with('response',$response);
    }
    public function deleteBanner($id)
    {
        banner::where('id',$id)->delete();
        session()->flash('message', 'Banner Deleted');
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBanner()
    {
        return view('adminPanel.banner.add');
    }


    public function insertBanner(Request $request)
    {
        $input = $request->all();
     
        $file=$request->file('image');
        
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images=$name;
    
                $input['image']=$images;
            
        
        unset($input['_token']);
        banner::insert($input);
        session()->flash('message', 'Banner Created');
        return back();



    }
 
    public function editBanner($id)
    {
        $data =banner::find($id);
        return view('adminPanel.banner.edit', compact('data'));
    }


    public function updateBanner(Request $request, $id)
    {
        $input = $request->all();
        $file=$request->file('image');
        
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images=$name;
    
                $input['image']=$images;

        unset($input['_token']);
        $data = banner::find($id);
        $data->title =  $request->get('title');
        $data->status = $request->get('status');
        $data->image = $images;
        $data->save();
        session()->flash('message', 'Banner Updated');
        return back();
    }


    public function destroy($id)
    {
        $data = banner::find($id);
        $data->delete();
        session()->flash('message', 'Banner Deleted');
        return back();
    }
   
}
