<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Customer;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use DB;
use PDF;
class orderController extends Controller
{
   public function manageOrderInfo(){
       $orders = DB::table('orders')
           ->join('customers','customers.id', '=', 'orders.customer_id')
           ->join('payments','payments.order_id' ,'=','orders.id')
           ->select('orders.*','customers.first_name','customers.last_name','customers.phone_number','payments.payment_type')
           ->latest()
           ->get();
       return view('admin.pages.order.manage-order',compact('orders'));
   }

   public function viewOrderDetails($id){
       $order        = Order::find($id);
       $customer     = Customer::find($order->customer_id);
       $shipping     = Shipping::find($order->shipping_id);
       $payment      = Payment::where('order_id',$order->id)->first();
       $orderDetails = OrderDetails::where('order_id',$order->id)->get();
       $total = OrderDetails::all()->where('order_id',$order->id)->sum(function ($t){
           return $t->product_price * $t->product_quantity;
       });
       return view('admin.pages.order.view-order',compact('order','customer','shipping','payment','orderDetails','total'));
   }

   public function viewOrderInvoice($id){
       $order        = Order::find($id);
       $customer     = Customer::find($order->customer_id);
       $shipping     = Shipping::find($order->shipping_id);
       $orderDetails = OrderDetails::where('order_id',$order->id)->get();
//       $total = OrderDetails::all()->where('order_id',$order->id)->sum(function ($t){
//           return $t->product_price * $t->product_quantity;
//       });
        return view('admin.pages.order.view-order-invoice',compact('order','customer','shipping','orderDetails'));
   }

   public function downloadOrderInvoice($id){
       $order        = Order::find($id);
       $pName        = DB::table('order_details')->join('products','order_details.product_id' ,'=', 'products.id')->select('products.product_name')->first();
       $customer     = Customer::find($order->customer_id);
       $shipping     = Shipping::find($order->shipping_id);
       $orderDetails = OrderDetails::where('order_id',$order->id)->get();
       $total = OrderDetails::all()->where('order_id',$order->id)->sum(function ($t){
           return $t->product_price * $t->product_quantity;
       });
       $pdf = PDF::loadView('admin.pages.order.download-invoice',['order'=>$order,'pName'=>$pName,'customer'=>$customer,'shipping'=>$shipping,'orderDetails'=>$orderDetails,'total'=>$total]);
       return $pdf->stream('invoice.pdf');
//       return $pdf->download('invoice.pdf');
   }

   public function Orderdestroy($order_id){
       Order::where('id',$order_id)->delete();
       return redirect()->back()->with('dlt','Order has been deleted!!');
   }

    public function OrderApproved ($id){
       $approved = Order::find($id);
       $approved->order_status = 'Approved';
       $approved->save();
       return redirect()->back()->with('msg','Order has been Approved!!');
   }

    public function OrderProcessing ($id){
        $approved = Order::find($id);
        $approved->order_status = 'Processing';
        $approved->save();
        return redirect()->back()->with('msg','Order is Processing!!');
    }

    public function OrderDelivered ($id){
        $approved = Order::find($id);
        $approved->order_status = 'Delivered';
        $approved->save();
        return redirect()->back()->with('msg','Order has been Delivered!!');
    }

    public function OrderPending ($id){
        $approved = Order::find($id);
        $approved->order_status = 'pending';
        $approved->save();
        return redirect()->back()->with('msg','Order is Pending!!');
    }

    public function OrderReturend ($id){
        $approved = Order::find($id);
        $approved->order_status = 'Returned';
        $approved->save();
        return redirect()->back()->with('dlt','Order has been Returend!!');
    }

}
