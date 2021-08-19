<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\newsletter;
class NewsletterController extends Controller
{
    public function editNews($id)
    {
        $data = newsletter::find($id);
        return view('adminPanel.newsletter.edit',compact('data'));
    }
    public function updateNews(request $request,$id)
    {
        $data = newsletter::find($id);
        $data->email =  $request->get('email');
        $data->status = $request->get('status');
        $data->save();
        session()->flash('message', 'Newsletter Detail Updated');
        return back();
    }
    public function viewNews(request $request)
    {
        $response=newsletter::all();

        return view('adminPanel.newsletter.view')->with('response',$response);
    }
    public function deleteNews($id)
    {
        newsletter::where('id',$id)->delete();
        session()->flash('message', 'Newsletter Deleted');
        return back();
    }
   
}
