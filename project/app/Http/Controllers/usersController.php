<?php
namespace App\Http\Controllers;

use App\Models\address;

use App\Models\category;
use App\Models\membershipShopper;
use App\Models\membershipVendor;
use App\Models\roles;
use App\Models\User;
use App\Models\origin;
use App\Models\products;
use App\Models\country;
use App\Models\testimonal;
use App\Models\add_staff;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Illuminate\Validation\Validator;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\vendorprofile;

class usersController extends Controller
{
    //
    public function addUsers()
    {
        $roles = roles::where('status', 1)->get();
        unset($roles[0]);
        $vendorMemberships = membershipVendor::where('status', 1)->get();
        $shopperMemberships = membershipShopper::where('status', 1)->get();
        $categories = category::where('status', 1)->where('type', 1)->get();
        return view('adminPanel.users.add')->with('roles', $roles)->with('shopperMemberships', $shopperMemberships)->with('vendorMemberships', $vendorMemberships)->with('categories', $categories);
    }
   public function insertUsers(request $request)
    {
        
   
        $input = $request->all();
        $address=$input;
        unset($input['aptNumber']);
        unset($input['address']);
        unset($input['city']);
        unset($input['country']);
        unset($input['zipCode']);
        unset($input['postalCode']);
        unset($input['_token']);
       
        $hobbies ='';
        foreach($input['hobbies'] as $single_hobby)
        {
            // dump($single_hobby);
            $hobbies.=$single_hobby.",";
        }

        

     
      
        if (isset($input['categories'])) {
            $input['categories'] = json_encode($input['categories']);
        }
      
 
        $validated = $request->validate([
           // 'terms' => 'required',
            'dob' => 'required|date|before:2003-07-1',
           
        ]);
       $email = $input['email'];
       $input['password'] = Hash::make($input['password']);
 
        User::insert([
            'nickname' => $input['nickname'],
            'name' => $input['name'],
            'email' => $input['email'],
            'dob' => $input['dob'],                  
            "phoneNumber" => $input['phone'] ,
            "gender" => $input['gender'] ,
            "age" => $input['age'] ,
            "maritalStatus" => $input['married'],
            "countryOfResidence" => $input['countryOfResidence'],               
            "countryOfOrigin" => $input['countryOfOrigin'] ,
            "hobbies" =>$hobbies,
            "status" => 0,
            "password" =>$input['password'] ,

      

    ]);
    $user_id = DB::getPdo()->lastInsertId();
   
        $addresss = new address();
        $addresss->userId = $user_id;
        $addresss->aptNumber = 0;
        $addresss->address = 0;
        $addresss->city =  $input['countryOfResidence'];  
        $addresss->country = $input['countryOfResidence']; 
        $addresss->zipCode = 0;
        $addresss->postalCode =0;
        $addresss->shippingAddress = 1;
        $addresss->billingAddress = 1;
        $addresss->save();
    
    
 
    // dd($user_id);

    //   echo $user_id;
    //   exit;
       return response()->json($user_id);
         

    }

  public function updateuser(Request $request)
    {

        $input = $request->all();

        $email = $input['email'];
        $id = $request->user_id;
        $data = user::find($id);
        $data->nickname = $input['nickname'];
        $data->name = $input['name'];
        $data->email = $input['email'];
        $data->dob =$input['dob'];                  
        $data->phoneNumber = $input['phoneNumber'] ;
        $data->gender = $input['gender'] ; 
        $data->age =$input['age'] ;
        $data->maritalStatus = $input['maritalStatus'];
        $data->status = $input['status'];
        $data->save();
       $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
        // More headers
        $headers .= 'From: scoutinonline <dev@devs.pearl-developer.com>' . "\r\n";
    
         $subject = "Registration Confirmation";
         $message = " Welcome to ScoutinOnline ";
         mail($email,$subject,$message,$headers);

        if(isset(Auth::user()->roleId) &&  Auth::user()->status ==0)
        {
            return back();
            
        }
        else
        {
           
         
            Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]);

            return redirect()->route('userDashboard');
        
        }
        
    }


    public function loginUser(request $request)
    {   
        
        Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password]);
        if(Auth::user()->roleId == 3)
        {
            
        $request->session()->flash('success', 'Login Successfully!');

         return redirect()->route('userDashboard');
        } 
        else {

            Auth::logout();
            return back();
        }
    }

 
   public function userDashboard()
    {
        
        if(Auth::check()) 
        
        $id =  Auth::user()->id;
 

        $data = DB::table('users as u')             
                    ->leftjoin('countries as c', 'c.id', '=', 'u.countryOfResidence')
                    ->leftjoin('origins as o', 'o.id', '=', 'u.countryOfOrigin') 
                    ->where('u.id',$id)       
                    ->select('u.*', 'c.name as cname' ,'o.name as oname')
                    ->first();
              
        return view('website.user.dashboard' , compact('data'));
    }


    public function vendor_reg_action(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'min:8|same:password',
            'city' => 'required|string',
            'countryOfResidence' => 'required|string',
            'phoneNumber' => 'required|string',
            'membershipVendorId' => 'required|string',
            
        ]);

        $input = $request->all();
        $input['status']="2";
        unset($input['_token']);
        unset($input['confirm_password']);
        try {
            $vendor = new User;
            $vendor->name = $input['name'];
            $vendor->email = $input['email'];
            $vendor->password = Hash::make($input['password']);
            $vendor->roleId = '2';
            $vendor->status =$input['status'];
            $vendor->city = $input['city'];
            $vendor->countryOfResidence = $input['countryOfResidence'];
            $vendor->phoneNumber = $input['phoneNumber'];
            $vendor->membershipVendorId = $input['membershipVendorId'];
           
            $insert = $vendor->save();
            if ($insert) {

                $email = $input['email'];
                
                  $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
                // More headers
                $headers .= 'From: ScoutinOnline <dev@devs.pearl-developer.com>' . "\r\n";
            
                $subject = "Registration Confirmation ";
                $message = "Welcome to ScoutinOnline ";
                mail($email,$subject,$message,$headers);
                return back()->with('success', 'You are accepted as Vendor Please Login!');
            } else {
                return back()->with('error', 'Something Wrong, Please Try again');
            }
        } catch (\Throwable $th) {
            return back()->withError($th->getMessage())->withInput();
        }
    }
    public function vendor_login_action(Request $request)
    {
        // return $request->all();
        // $input = $request->all();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // return Auth::user();


            if (Auth::user()->roleId == 2) {
                return view('adminPanel.dashboard')->with('success', 'Login Successfull');
            } else {
                Auth::logout();
                session()->flash('error', 'You are not register as Vendor');
                return back();
            }
        } else {

            session()->flash('error', 'No Record Found');
            return back();
        }
    }
    public function signout(Request $request)
    {
        Auth::logout();
        // Session::flush();
        $request->session()->flash('success', 'Logout Successfully!');
        return redirect('/');
    }



    public function ChangeProfile(Request $request)
    {


        if ($request->isMethod('post')) {

            $input = $request->all();

            $old = $input['old_password'];
            $new = $input['current_password'];
            if (!empty($old) && !empty($new)) {
                if ($old == $new) {
                    $new_pwd = bcrypt($new);

                    $id = Auth::User()->id;
                    $user = User::find($id);
                    // echo "<pre>";
                    // echo $user;
                    // die;
                    $hobbies = array();
                    $user->nickname = $input['nickname'];
                    $user->name = $input['name'];
                    $user->email = $input['email'];
                    $user->dob = $input['dob'];
                    $user->phoneNumber = $input['phoneNumber'];
                    $user->gender = $input['gender'];
                    $user->age = $input['age'];
                    $user->maritalStatus = $input['maritalStatus'];
                    $user->countryOfResidence = $input['countryOfResidence'];
                    $user->countryOfOrigin = $input['countryOfOrigin'];
                    $user->hobbies = implode("|", $hobbies);
                    $user->password = $new_pwd;
                    $user->save();

                    //User::where('id', Auth::User()->id)->update(['password' => $new_pwd]);
                    session()->flash('message', 'password change');
                    return back();
                } else {
                    return back()->with('error', 'Something Wrong, Please Try again');
                }
            }
        }
        return back()->with('error', 'Something Wrong, Please Try again');
    }
    public function ProfileChange(Request $request)
    {

        if ($request->isMethod('post')) {
            $input = $request->all();

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/uploads/product');
            $file->move($destinationPath, $name);
            $name = "uploads/product/" . $name;
            $images = $name;
            $input['image'] = $images;

            if (!empty($images)) {

                User::where('id', Auth::User()->id)->update(['imageUrl' => $images]);
                session()->flash('message', 'profile upload');
                return back();
            }
        }
        return back();
    }

    public function testimonialsSend(Request $request)
    {
        // dd($request->all());

        $data = $request->all();
        unset($data['_token']);

        $data['userid'] = Auth::id();
        $data['status'] = "0";


        $checknsert = testimonal::insert($data);
        if ($checknsert) {
            return redirect()->back()->with('success', "Thanks For Testimonial..");
        } else {
            return redirect()->back()->with('error', "Error in add Testimonial");
        }
    }

    public function resetPassword()
    {
        return view('website.user.resetpassword');
    }

    public function resetcode()
    {
        return view('website.user.resetcode');
    }
    public function codematch(Request $request)
    {
        $code = $request->get('code');
        //dd($code);
        $user_email = Session::get('user_email');
        Session::put('user_email', $user_email);
        $old_pwd = User::where('email', $user_email)->first();
        $code1 = $old_pwd->password;
        //  echo $code;
        //  echo $code1;
        //  exit;
        if ($code == $code1) {
            return redirect('passwordform');
        } else {

            return back()->with('status', 'code not match');
        }
    }
    public function editVendor($id)
    {
        $response = user::where('id', $id)->first();
        return view('adminPanel.users.edit')->with('response', $response);
    }
    public function vendorProfile(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $input = $request->all();

            $file = $request->file('image');

            $name = $file->getClientOriginalName();
            $destinationPath = public_path('/uploads/product');
            $file->move($destinationPath, $name);
            $name = "uploads/product/" . $name;
            $images = $name;
            $input['image'] = $images;

            if (!empty($images)) {

                User::where('id', $id)->update(['imageUrl' => $images]);
                session()->flash('message', 'profile upload');
                return back();
            }
        }
    }


    public function passwordform()
    {
        return view('website.user.newpassword');
    }
    public function NewPassword(Request $request)
    {

        $pass = $request->get('password');
        $confrm_pass = $request->get('password_confirmation');
        if ($pass == $confrm_pass) {
            $user_email = Session::get('user_email');
            $new_pwd = bcrypt($pass);
            User::where('email', $user_email)->update(['password' => $new_pwd]);
            Session::forget('user_email');
            return redirect('/');
        } else {
            return back()->with('status', 'password not match');
        }

        function address()
        {
            $address = address::where('userId', Auth::id())->get();
            return view('website.user.address', compact('address'));
        }
    }
    public function Alluser()
    {
        $response = category::all();
        return view('adminPanel.users.index')->with('response', $response);
    }

    public function ResetEmail(Request $request)
    {
        $user_email = $request->email;

        $data1 = User::where('email', $user_email)->first();
        $pass = random_int(100000, 999999);
        Session::put('pass', $pass);
        if (!empty($data1)) {
            $data = $request->all();
            unset($data['_token']);

     
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
        // More headers
        $headers .= 'From: ScoutinOnline <dev@devs.pearl-developer.com>' . "\r\n";
    
         $subject = "password";
         $message = "your password is ".$pass;
        mail($user_email,$subject,$message,$headers);
   


            if (count(Mail::failures()) > 0) {

                return redirect()->back()->with('error', "information sended error.....");
            } else {
                Session::put('user_email', $user_email);

                User::where('email', $user_email)->update(['password' => $pass]);
                Session::forget('pass');
                // $data = User::where('email',$user_email)->first();
                return redirect('resetcode');
            }
        }
    }

    public function viewTestimonal(Request $request)
    {
        $response = testimonal::all();

        return view('adminPanel.testimonials.view')->with('response', $response);
    }
   public function termsagreement($id)
    {

         return view('website.terms-agreement');
    }
    public function editTestimonal($id)
    {
        $status = testimonal::where('id', $id)->where('status', "0")->first();
        // dd($status);
        $checkTest = false;
        if (empty($status)) {
            $checkTest = testimonal::where('id', $id)->update([
                "status" => '0'
            ]);
            if ($checkTest) {
                return redirect()->back()->with('success', "Testimonial Udpated Successfully to Off..");
            } else {
                return redirect()->back()->with('error', "Error in updateing Testimonial");
            }
        } else {
            $checkTest = testimonal::where('id', $id)->update([
                "status" => '1'
            ]);
            if ($checkTest) {
                return redirect()->back()->with('success', "Testimonial Udpated Successfully to Show..");
            } else {
                return redirect()->back()->with('error', "Error in updateing Testimonial");
            }
        }
    }

    // public function vendor_dashboard_Profile()
    // {
    //     $id = Auth::user()->id;
    //   $vendor_profile = User::where('id',$id)->get();
 
    //   $response=add_staff::where(['added_by'=>$id])->get();
    //   return view('adminPanel.profile.view_profile')->with('vendor',$vendor_profile)->with('response',$response);
    // }

    public function vendor_detail($id)
    {

        $vendor= User::where('id',$id)->get();
        $staff=add_staff::where(['added_by'=>$id])->get();
        $products = products::where('products.status', 1)
        ->where('products.added_by','=',$id)
        ->join('markets', 'markets.id', '=', 'products.marketId')
        ->select('products.*', 'markets.name as mName')->get();


        return view('website.vendor.vendor_detail')->with(['vendor'=>$vendor,'staff'=>$staff,'products'=>$products]);
    }

     
     public function allVendor()
    {
        $allVendor = User::where(['roleId'=>'2','status'=>'1'])->get();
        return view('adminPanel.vendor.all_vendors')->with('allVendor',$allVendor);
    }
    
      public function allVendorRequest()
    {
        $vendorReq = User::where(['roleId'=>'2','status'=>'2'])->get();
        // dd($vendorReq);
        return view('adminPanel.vendor.Vendor_approve_req')->with('vendorReq',$vendorReq);
    }
    
      public function approveVendor($id)
    {
        $vendorReq = User::where('id',$id)->update(['status'=>1]);
        session()->flash('message','Vendor Approved');
        return view('adminPanel.vendor.Vendor_approve_req')->with('vendorReq',$vendorReq);
    }
    
    public function delete_user($id){
        $del=User::where('id',$id)->delete();
        session()->flash('message','User Deleted');
        return back();
    }
 
     

 
    public function vendor_dashboard_Profile()
    {
      $id = Auth::user()->id;
      $vendor_profile = User::where('id',$id)->get();

      $pro =DB::table('users as u')
          ->leftjoin('vendorprofiles as v' , 'v.vendor_id' , '=' , 'u.id')
          ->leftjoin('membership_vendors as m' , 'm.id' , '=' , 'u.membershipVendorId')
          
          ->select('v.*' , 'u.*' ,'u.name as uname','u.id as uid','m.name as mname')
          ->where('u.id' , $id)
          ->first();

      
      $response=add_staff::where(['added_by'=>$id])->get();
      return view('adminPanel.profile.view_profile')->with('vendor',$vendor_profile)->with('response',$response)->with('pro' ,$pro);
    }


    public function vendorProfileDetail(Request $request , $id)
    {
      
        $vendorDetail = vendorprofile::where('vendor_id',$id)->first();
        if(!empty($vendorDetail))
        {
          
            $vendorDetail->company_name =  $request->get('company_name');
            $vendorDetail->payment_info =  $request->get('payment_info');
            $vendorDetail->account_no =  $request->get('account_no');
            $vendorDetail->credit_card =  $request->get('credit_card');
            $vendorDetail->owner = $request->get('owner');
            $vendorDetail->save();
            session()->flash('message', 'Vendor Profiel Updated');
            return back();
        }
        else
        {
           
            $input = $request->all();
            unset($input['_token']);
            vendorprofile::insert($input);
            session()->flash('message', 'Vendor Profiel Updated');
            return back();
        }

    

    }

}


//