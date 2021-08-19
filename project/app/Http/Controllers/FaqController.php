<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Models\faq;
class FaqController extends Controller
{

    public function editFaq($id)
    {
        $data = faq::find($id);
        return view('adminPanel.faq.edit',compact('data'));
    }
    public function updateFaq(request $request,$id)
    {
        $data = faq::find($id);
        $data->title =  $request->get('title');
        $data->description =  $request->get('description');
        $data->status = $request->get('status');
        $data->save();
        session()->flash('message', 'Faq Detail Updated');
        return back();
    }
    public function createFaq()
    {
        return view('adminPanel.faq.add');
    }
    public function insertFaq (request $request)
    {
        $input=$request->all();
        unset($input['_token']);

        faq::insert($input);
        session()->flash('message', 'Faq Created');
        return back();
    }
    public function viewFaq(request $request)
    {
        $response=faq::all();

        return view('adminPanel.faq.view')->with('response',$response);
    }
    public function deleteFaq($id)
    {
        faq::where('id',$id)->delete();
        session()->flash('message', 'Faq Deleted');
        return back();
    }
   
}