<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Session;

use Auth;

use App\Models\follow_unfollow_vendor;
use App\Models\User;

class followUnfollowController extends Controller

{

    public function follow(Request $request)
    {   $vendor_id = $request->vendor_id;
        $result = array();
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $check = follow_unfollow_vendor::where(['Vendor_id'=>$vendor_id,'follower_id'=>$user_id])->first();
            if(empty($check)){
                $data = new follow_unfollow_vendor;
                $data->	Vendor_id = $vendor_id;
                $data->	follower_id = $user_id;
                $follow = $data->save();
                if($follow){
                    echo '1';
                }else{
                    echo '2';
                }
            }else{
                $unfollow= follow_unfollow_vendor::where('id',$check->id)->delete();
                if($unfollow){
                    echo '3';
                }else{
                    echo '4';
                }
            }

        }else{
            echo '5';
        }
    }
    public function all_followers(Type $var = null)
    {
        if (Auth::check()) {
            $id= Auth::user()->id;
            $all_followers = follow_unfollow_vendor::join('users', 'users.id', '=', 'follow_unfollow_vendors.follower_id')
        ->where('follow_unfollow_vendors.vendor_id', $id)->get(['users.*','follow_unfollow_vendors.*']);
            // $request->session()->flash('message', '');
            return view('adminPanel.Followers.followers')->with('all_followers', $all_followers);
        }
        else{
            return back()->with('message','Please Login Again');
        }
    }

    public function deleteFollower($id)
    {
      $delete = follow_unfollow_vendor::where('id',$id)->delete();
      if($delete){
        return back()->with('message','Follower deleted Successfully');
      }else{
        return back()->with('error','Something Wrong');

      }
    }
}