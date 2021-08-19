<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;
use Auth;
use App\Models\add_staff;
use File;


class addStaffController extends Controller

{
public function index()
{
 return view('adminPanel.add_staff.add_staff');
}

public function add_staff(Request $request)
{
    $input =$request->all();
    $file=$request->file('image');
    $name=$file->getClientOriginalName();

    // $file->move('image',$name);
   
    $file->move(public_path('uploads/staffImage'), $name);
    $images=$name;
    $input['added_by']=Auth::user()->id;
    $input['image']=$images;

unset($input['_token']);

add_staff::insert($input);

session()->flash('message', 'Added Successfully');

return back();

}

public function view_staff()
{
   $added_by = Auth::user()->id;
    $response=add_staff::where(['added_by'=>$added_by])->get();

    return view('adminPanel.add_staff.view')->with('response',$response);
}

public function editStaff($id)

{
    // return $id;

    $data =add_staff::where('id',$id)->get();
    // return $data;
    return view('adminPanel.add_staff.editStaff')->with('data',$data[0]);

}
public function deleteStaff($id)
{
    $delete = add_staff::where('id',$id)->delete();
    session()->flash('message', 'Deleted Successfully');
    return back();
}

public function updateStaff(Request $request,$id,$image)
{
    $input =$request->all();
    $file=$request->file('image');
    $name=$file->getClientOriginalName();

    // $file->move('image',$name);
   
    $file->move(public_path('uploads/staffImage'), $name);
    $images=$name;
    $input['added_by']=Auth::user()->id;
    $input['image']=$images;

unset($input['_token']);
$added_by = Auth::user()->id;


$update = add_staff::where(['id'=>$id,'added_by'=>$added_by])->update($input);
if ($update) {
    $filename = "public_path('uploads/staffImage/'.$image)";
    $file_path = public_path('uploads/staffImage/').'/'.$image;
    // if (File::exists($file_path)) {
        File::exists($file_path); 
        File::delete($file_path);
    // }else{
    //     session()->flash('message', 'Something Wrong');
    //      return back();
    // }
    session()->flash('message', 'updated Successfully');
    return redirect()->route('view_staff');

}else{
    session()->flash('message', 'Something Wrong');
    return back();
}
}



}