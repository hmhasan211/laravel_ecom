<?php

namespace App\Http\Controllers;

use App\Brand;
use App\categories;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.pages.brand.add_brand');
    }

    public function saveBrand(Request $request){
        $this->validate($request,[
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u|max:15|min:5',
            'brand_description'=>'required',
            'pub_status'=>'required'
        ]);
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->pub_status = $request->pub_status;
        $brand->save();
        return redirect('/manage/brand')->with('msg','Congratulation!!');
    }

    public function manageBrand(){
        $brands = Brand::all();
        return view('admin.pages.brand.manage_brand',['brands'=>$brands]);
    }

    public function UnpublishedBrand($id){
        $brands = Brand::find($id);
        $brands->pub_status = 0;
        $brands->save();
        return redirect('/manage/brand')->with('msg','Publication Status has been changed!');
    }
    public function publishedBrand($id){
        $brands = Brand::find($id);
        $brands->pub_status = 1;
        $brands->save();
        return redirect('/manage/brand')->with('msg','Publication Status has been changed!');

    }

    public function editBrand($id){
        $brands = Brand::find($id);
        return view('admin.pages.brand.edit_brand',['brands'=>$brands]);
    }
    public function updateBrand(Request $request){
        $brands = Brand::find($request->brand_id);

        $brands->brand_name = $request->brand_name;
        $brands->brand_description = $request->brand_description;
        $brands->pub_status = $request->pub_status;
        $brands->save();
        return redirect('/manage/brand')->with('msg','Brand has been updated!');
    }
    public function deleteBrand($id){
        $brands = Brand::find($id);
        $brands->delete();
        return redirect('/manage/brand')->with('dlt','Brand has been Deleted!');
    }
}
