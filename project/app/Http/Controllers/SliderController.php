<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\slider;
class SliderController extends Controller
{
  
    public function viewSlider(request $request)
    {
        $response=slider::all();

        return view('adminPanel.slider.view')->with('response',$response);
    }
    public function deleteSlider($id)
    {
        slider::where('id',$id)->delete();
        session()->flash('message', 'Slider Deleted');
        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSlider()
    {
        return view('adminPanel.slider.add');
    }


    public function insertSlider(Request $request)
    {
        $input = $request->all();
     
        $file=$request->file('image');
        
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images=$name;
    
                $input['image']=$images;
            
        
        unset($input['_token']);
        slider::insert($input);
        session()->flash('message', 'Slider Created');
        return back();



    }
 
    public function editSlider($id)
    {
        $data =slider::find($id);
        return view('adminPanel.slider.edit', compact('data'));
    }


    public function updateSlider(Request $request, $id)
    {
        $input = $request->all();
        $file=$request->file('image');
        
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images=$name;
    
                $input['image']=$images;

        unset($input['_token']);
        $data = slider::find($id);
        $data->title =  $request->get('title');
        $data->status = $request->get('status');
        $data->image = $images;
        $data->save();
        session()->flash('message', 'Slider Updated');
        return back();
    }


    public function destroy($id)
    {
        $data = slider::find($id);
        $data->delete();
        session()->flash('message', 'Slider Deleted');
        return back();
    }
   
}
