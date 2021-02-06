<?php

namespace App\Http\Controllers;

use App\Brand;
use App\categories;
use App\product;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(){
        $categories = categories::where('pub_status',1)->get();
        $brands = Brand::where('pub_status',1)->get();
        return view('admin.pages.products.add_product',['categories'=>$categories,'brands'=>$brands]);
    }

    protected function productInfoValidate($request){
       $this->validate($request,[
//           'product_name'=>'required|regex:/^[\pL\s\-]+$/u|max:150|min:5',
           'product_name'=>'required|max:150|min:5',
           'product_price'=>'required',
           'product_quantity'=>'required',
           'short_description'=>'required|min:5|max:500',
           'long_description'=>'required|min:5|max:1500',
           'product_image'=>'required',
           'pub_status'=>'required'

       ]);
    }

    protected function productImageUpload($request){
        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
        $productImage->move($directory, $imageName);
//        Image::make($productImage)->save();
        return $imageUrl;
    }

    protected function SaveProductBasicInfo($request,$imageUrl){
        $product = new product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->pub_status = $request->pub_status;
        $product->save();
    }

    public function saveProduct(Request $request){
        $this->productInfoValidate($request);  //taken from uper method
        $imageUrl = $this->productImageUpload($request);  //taken from uper method
        $this->SaveProductBasicInfo($request,$imageUrl);  //taken from uper method

        return redirect('manage/product')->with('msg','Product Added successfully');
    }

    public function manageProduct(){
        $products = DB::table('products')
                    ->join('categories','categories.id',  '=', 'products.category_id')
                    ->join('brands','brands.id',  '=', 'products.brand_id')
                    ->select('products.*','brands.brand_name', 'categories.category_name')
                  ->orderBy('id','DESC')
//                    ->latest()
                    ->get();

        return view('admin.pages.products.manage_product',compact('products'));
    }

    public function Unpublishedproduct($id){
        $products = product::find($id);
        $products->pub_status = 0;
        $products->save();
        return redirect('/manage/product')->with('msg','Publication Status has been changed!');
    }
    public function publishedproduct($id){
        $products = product::find($id);
        $products->pub_status = 1;
        $products->save();
        return redirect('/manage/product')->with('msg','Publication Status has been changed!');

    }

    public function editProduct($id){
        $categories = categories::all();
        $brands = Brand::all();
        $products = product::find($id);
       return view('admin.pages.products.edit_product',compact('products','categories','brands'));
    }

    public function ProductBasicInfoupdate($product,$request,$imageUrl=null){
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        if ($imageUrl){
            $product->product_image = $imageUrl;
        }
        $product->pub_status = $request->pub_status;
        $product->save();
    }

    public function updateProduct(Request $request){
        $productimage = $request->file('product_image');
        $product = product::find($request->product_id);

        if ($productimage){
            unlink($product->product_image);
            $imageUrl = $this->productImageUpload($request);
            $this->ProductBasicInfoupdate($product,$request,$imageUrl);
            return redirect('manage/product')->with('msg','Product Added successfully');

        } else{

            $this->ProductBasicInfoupdate($product,$request);
            return redirect('/manage/product')->with('msg','Product  has been changed!');
        }

    }

    public function deleteProduct($id){
        product::find($id)->delete();
        return redirect('/manage/product')->with('dlt ','Product  has been changed!');
    }

}
