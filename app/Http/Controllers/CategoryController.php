<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        return view('admin.pages.categories.add_category');
    }

    public function saveCategory(Request $request){
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
            'pub_status'=>'required'
        ]);
        $category = new categories();
        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->pub_status           = $request->pub_status;
        $category->save();
        return redirect('/manage/category')->with('msg','Congratulation!!');
    }

    public function manageCat(){
        $categories = categories::get();
        return view('admin.pages.categories.manage_category',['categories'=>$categories]);
    }

    public function UnpublishedCategory($id){
        $category = categories::find($id);
        $category->pub_status = 0;
        $category->save();
        return redirect('/manage/category')->with('msg','Publication Status has been changed!');
    }
    public function publishedCategory($id){
        $category = categories::find($id);
        $category->pub_status = 1;
        $category->save();
        return redirect('/manage/category')->with('msg','Publication Status has been changed!');

    }
    public function editCategory($id){
        $category = categories::find($id);
        return view('admin.pages.categories.edit_category',['category'=>$category]);
    }

    public function updateCategory(Request $request){
        $category = categories::find($request->category_id);

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->pub_status = $request->pub_status;
        $category->save();
        return redirect('/manage/category')->with('msg','Category has been updated!');
    }

    public function deleteCategory($id){
        $category = categories::find($id);
        $category->delete();
        return redirect('/manage/category')->with('dlt','Category has been updated!');
    }

}
