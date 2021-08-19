<?php

namespace App\Http\Controllers;

use App\Models\contactus;
use App\Models\newsletter;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function createContact()
    {
        return view('adminPanel.contact.add');
    }
    public function insertContact (request $request)
    {
        $input=$request->all();
        unset($input['_token']);

        contactus::insert($input);
        session()->flash('message', 'Contact Created');
        return back();
    }
    public function viewContact(request $request)
    {
        $response=contactus::all();

        return view('adminPanel.contact.view')->with('response',$response);
    }
    public function deleteContact($id)
    {
        contactus::where('id',$id)->delete();
        session()->flash('message', 'Contact Deleted');
        return back();
    }
    public function formcontact(Request $request)
    {  
        
        $input=$request->all();
        unset($input['_token']);

        contactus::insert($input);
      
        session()->flash('message', 'data submitted successfully');
        return back();
        
    }

    public function subscribe(Request $request)
    {
        
        $input=$request->all();
        unset($input['_token']);

        newsletter::insert($input);
        return back();
     
    }


    public function editContact($id)
    {
        $data =    contactus::find($id);
        return view('adminPanel.contact.edit',compact('data'));
    }
    public function updateContact(request $request,$id)
    {
        $data = contactus::find($id);
        $data->name =  $request->get('name');
        $data->email =  $request->get('email');
        $data->phone_no =  $request->get('phone_no');
        $data->subject =  $request->get('subject');
        $data->message = $request->get('message');
        $data->save();
        session()->flash('message', 'Contact Detail updated');
        return back();
    }
}

