<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        return view('admin.pages.coupon.add_coupon');
    }

    public function saveCoupon(Request $request){
//        $this->validate($request,[
//            'coupon_name'=>'required|regex:/^[\pL\s\-]+$/u|max:15|min:5',
//            'coupon_description'=>'required',
//            'status'=>'required'
//        ]);
        $coupon = new Coupon();
        $coupon->coupon_name = strtoupper($request->coupon_name);
        $coupon->discount = $request->discount;
        $coupon->save();
        return redirect('/manage/coupon')->with('msg','Congratulation!!');
    }

    public function manageCoupon(){
        $coupons = Coupon::all();
        return view('admin.pages.coupon.manage_coupon',['coupons'=>$coupons]);
    }

    public function UnpublishedCoupon($id){
        $coupons = Coupon::find($id);
        $coupons->status = 0;
        $coupons->save();
        return redirect('/manage/coupon')->with('msg','Publication Status has been changed!');
    }
    public function publishedCoupon($id){
        $coupons = Coupon::find($id);
        $coupons->status = 1;
        $coupons->save();
        return redirect('/manage/coupon')->with('msg','Publication Status has been changed!');

    }

    public function editCoupon($id){
        $coupons = Coupon::find($id);
        return view('admin.pages.coupon.edit_coupon',['coupons'=>$coupons]);
    }
    public function updateCoupon(Request $request){
        $coupons = Coupon::find($request->coupon_id);

        $coupons->coupon_name = $request->coupon_name;
        $coupons->discount = $request->discount;
        $coupons->save();
        return redirect('/manage/coupon')->with('msg','Coupon has been updated!');
    }
    public function deleteCoupon($id){
        $coupons = Coupon::find($id);
        $coupons->delete();
        return redirect('/manage/coupon')->with('dlt','Coupon has been Deleted!');
    }

}
