<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class WishlistController extends Controller
{
    public function addWishlist($productId){
        if (Session::get('customerId')){
            Wishlist::insert([
                'customer_id'=>Session::get('customerId'),
                'product_id'=>$productId,
            ]);
            return redirect()->back()->with('cartAdded','Product added to wishlist!!');
        }else{
            return redirect('/customer-signup-form')->with('warning','Please signup first!!');
        }
    }

    public function wishlist(){
        $wishlist = Wishlist::where('customer_id',Session::get('customerId'))->orderBy('id','DESC')->get();
        return view('front-end.checkout.wishlist',compact('wishlist'));
    }

    public function wishDestroy($wish_id){
        Wishlist::where('id',$wish_id)->where('customer_id',Session::get('customerId'))->delete();
        return redirect()->back()->with('item_delete','Product removed from wishlist!!');
    }
}
