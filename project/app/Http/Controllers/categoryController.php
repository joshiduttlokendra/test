<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\markets;
use App\Models\User;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    public function createCategory()
    {
        $catrgories = category::where('type', 1)->where('status', 1)->get();
        return view('adminPanel.category.add')->with('catrgories', $catrgories);
    }
    public function insertCategory(request $request)
    {
        $input = $request->all();
        unset($input['_token']);

        if ($request->hasFile('imageUrl')) {
            $image = $request->file('imageUrl');
            $name = time() . 'category.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/category');
            $image->move($destinationPath, $name);
            $name = "/uploads/category/" . $name;
            $input['imageUrl'] = $name;
        }


        category::insert($input);
        session()->flash('message', 'Category Created');
        return back();
    }
    public function viewCategories(request $request)
    {
        $categories = category::all();

        $response = array();
        $i = 0;
        foreach ($categories as $category) {
            $response[$i]['name'] = $category->name;
            $response[$i]['id'] = $category->id;
            if ($category->type == 1) {
                $response[$i]['type'] = 'Parent';
            } else {
                $response[$i]['type'] = 'Child';
            }
            if ($category->parentId == null) {
                $response[$i]['parent'] = '------';
            } else {
                $response[$i]['parent'] = category::where('id', $category->parentId)->first()->name;
            }
            $response[$i]['imageUrl'] = $category->imageUrl;
            $response[$i]['status'] = $category->status;
            $response[$i]['c_type'] = $category->c_type;
            $i++;
        }
        return view('adminPanel.category.view')->with('response', $response);
    }
    public function deleteCategory($id)
    {
        category::where('id', $id)->delete();
        session()->flash('message', 'Category Deleted');
        return back();
    }
}
