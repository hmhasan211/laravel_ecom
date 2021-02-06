<?php

namespace App\Http\Controllers;

use App\categories;
use App\product;
use Illuminate\Http\Request;
use DB;

class SuperMarketController extends Controller
{
    public function index(){
        $products = product::where('pub_status',1)->latest()->take(4)->get();
        return view('front-end.pages.home',compact('products'));
    }

    public function categoryProduct($id){
        $catProducts = product::where('category_id', $id)
                                ->where('pub_status',1)->get();
        $products = product::where('pub_status',1)->latest()->take(4)->get();
        return view('front-end.category.category-content',compact('catProducts','products'));
    }

    public function productDetails($id){
        $singleProduct = product::find($id);
        $products = product::where('pub_status',1)->latest()->take(4)->get();
        return view('front-end.category.product-details',compact('singleProduct','products'));
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('products')
                ->orWhere('product_name', 'LIKE', '%'.$query.'%')
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row) {
                $output .= '<li><a href="#">'.$row->product_name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function searchProduct(Request $request){
        $search = $request->search;
        $searchProducts = product::orWhere('product_name','like','%'.$search.'%')
            ->orWhere('short_description','like','%'.$search.'%')
            ->orWhere('long_description','like','%'.$search.'%')
            ->orWhere('product_price','like','%'.$search.'%')
            ->paginate(8);
        return view('front-end.pages.search-product',compact('searchProducts','search'));
    }
}
