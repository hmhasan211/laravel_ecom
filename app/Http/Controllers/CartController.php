<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cartProductList(){
        $total = Cart::all()->where('user_ip',request()->ip())->sum(function ($t){
            return $t->product_price * $t->product_quantity;
        });
        $carts = Cart::where('user_ip',request()->ip())->latest()->get();
//        $carts = DB::table('carts')->join('products','product.id','=','carts.product_id')
//                            ->select('carts.*','product.product_image','product.product_quantity','product.product_name','product.product_price')
//                            ->where('user_ip',request()->ip())
//                            ->orderBy('id','DESC')
//                            ->get();
        return view('front-end.checkout.cart-product-list',compact('carts','total'));
    }

   public function addToCart(Request $request,$product_id){
       $check = Cart::where('product_id',$product_id)->where('user_ip',request()->ip())->first();
       if ($check) {
           Cart::where('product_id', $product_id)->where('user_ip',request()->ip())->increment('product_quantity');
           return Redirect()->back()->with('cartAdded','Product Added to Cart Successfully');
       }else{
           $cart = new Cart();
           $cart->product_id = $request->product_id;
           $cart->product_quantity =1;
           $cart->product_price = $request->product_price;
           $cart->user_ip = request()->ip();
           $cart->save();
           return Redirect()->back()->with('cartAdded','Product Added to Cart Successfully');
       }
   }

   public function increaseItem($incItem){
         Cart::where('id',$incItem)->where('user_ip',request()->ip())->increment('product_quantity');
       return Redirect()->back()->with('cartAdded','Product Added to Cart Successfully');
   }
    public function decreaseItem($decItem){
        Cart::where('id',$decItem)->where('user_ip',request()->ip())->decrement('product_quantity');
        return Redirect()->back()->with('item_delete','Product removed from Cart ');
    }

   public function cartItemDestroy($item_id){
        Cart::where('id',$item_id)->where('user_ip',request()->ip())->delete();
       return Redirect()->back()->with('item_delete','Product removed from Cart ');
   }

    public function applyCoupon(Request $request){
        $check = Coupon::where('coupon_name',$request->coupon)->first();
        if ($check){
            Session::put('coupon',[
                'coupon_name'=>$check->coupon_name,
                'discount'=>$check->discount,
            ]);

            return Redirect()->back()->with('cartAdded','Coupon applied Successfully!!!');

        }else{
            return Redirect()->back()->with('item_delete','Sorry!! failed to apply Coupon.');
        }
    }
}
