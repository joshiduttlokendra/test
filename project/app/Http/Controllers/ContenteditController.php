<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\meta;
use DB;

class ContenteditController extends Controller
{
    public function saveDynamicData(Request $request)
    {
		$data = $request->get('data');
		$key = $request->get('key');
		$arr = array(
			'meta_key' => $key,
			'meta_value' => $data
		);
        $result =  DB::table('meta')->where('meta_key',$key)->first();
	
		if(!empty($result)){
            DB::table('meta')->where('meta_key',$key)->update($arr);
			
		}else{
			return 1;
    }
}

public function uploadImage(Request $request)
{
    
	           $key = $request->get('key');
				$file=$request->file('userfile');
				$name1 = time().'userfile.'.$file->getClientOriginalExtension();
			
				$destinationPath = public_path('/homepage/userfile');
				$file->move($destinationPath, $name1);
				$name ="/homepage/userfile/".$name1;
				$input['userfile'] = $name1;
	
        unset($input['_token']);
		$arr = array(
			'meta_key' => $key,
			'meta_value' => $name1
		);
	
        DB::table('meta')->where('meta_key',$key)->update($arr);
		return redirect()->back();
}
}