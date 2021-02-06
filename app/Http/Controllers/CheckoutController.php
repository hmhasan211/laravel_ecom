<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Customer;
use App\Order;
use App\OrderDetails;
use App\Payment;
use App\Shipping;
use App\help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public function index(){
        return view('front-end.checkout.checkout-content');
    }

    protected function customerSignUpValidate($request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email_address'=>'required',
            'password'=>'required',
            'phone_number'=>'required',
            'address'=>'required',
        ]);
    }

    public function customerSignUp(Request $request){
        $this->customerSignUpValidate($request);
        $customer = new Customer;
        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->email_address=$request->email_address;
        $customer->password=bcrypt($request->password);
        $customer->phone_number=$request->phone_number;
        $customer->address=$request->address;
        $customer->save();


        $customerId = $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

        $data = $customer->toArray();
        Mail::send('front-end.pages.confirmaton-mail',$data,function ($message) use($data){
            $message->to($data['email_address']);
            $message->subject('Confirmation Email');
        });
        return redirect('checkout/shipping');
    }

    public function customerLoginForm(){
        return view('front-end.checkout.customer-login');
    }

    public function customerLogin(Request $request)
    {
        $customerlogin = Customer::where('email_address', $request->email_address)->first();
        if ($customerlogin == '') {
            return redirect('/customer-login-form')->with('customer_login', 'Sorry you are not registered yet!');

        }elseif(password_verify($request->password, $customerlogin->password)){
            Session::put('customerId', $customerlogin->id);
            Session::put('customerName', $customerlogin->first_name .' '. $customerlogin->last_name);
        return redirect('/checkout/shipping');
        }else{
        return redirect('/customer-login-form')->with('customer_login', 'Sorry!! Failed to login!!');
          }
    }


//customer logout
    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }


    public function shippingForm(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping',compact('customer'));
    }

    public function saveShippingInfo(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }

    public function paymentForm(){
        return view('front-end.checkout.payment');
    }

    public function newOrder(Request $request){
        $paymentType = $request->payment_type;
        if ($paymentType=='Cash'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
//            $order->product_name = Session::get('product_name');
            $order->discount_amount = (Session::get('discountAmonut'));
            $order->product_price = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::all();
            foreach ($cartProducts as $cartProduct){
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->product_id;
                $orderDetails->product_price = $cartProduct->product_price;
                $orderDetails->product_quantity = $cartProduct->product_quantity;
                $orderDetails->save();
            }
            Session::forget(['coupon','discountAmonut']);
            Cart::where('user_ip',request()->ip())->delete();
            return redirect('/')->with('cartAdded','Thanks for ordering !!!');

        }elseif ($paymentType=='Bkash'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
//            $order->product_name = Session::get('product_name');
            $order->discount_amount = Session::get('discountAmonut');
            $order->product_price = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::all();
            foreach ($cartProducts as $cartProduct){
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->product_id;
                $orderDetails->product_price = $cartProduct->product_price;
                $orderDetails->product_quantity = $cartProduct->product_quantity;
                $orderDetails->save();
            }
            Session::forget(['coupon','discountAmonut']);
            Cart::where('user_ip',request()->ip())->delete();
            return redirect('/')->with('cartAdded','Thanks for ordering !!!');

        }elseif($paymentType=='paypal'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
//            $order->product_name = Session::get('product_name');
            $order->discount_amount = Session::get('discountAmonut');
            $order->product_price = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::all();
            foreach ($cartProducts as $cartProduct){
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->product_id;
                $orderDetails->product_price = $cartProduct->product_price;
                $orderDetails->product_quantity = $cartProduct->product_quantity;
                $orderDetails->save();
            }
            Session::forget(['coupon','discountAmonut']);
            Cart::where('user_ip',request()->ip())->delete();
            return redirect('/')->with('cartAdded','Thanks for ordering !!!');
        }
    }


    public function help(){
        return view('front-end.pages.help');
    }
    public function saveInfo(Request $request){
            help::insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);
            return redirect()->back()->with('cartAdded','Message send successfully !!!');
    }


    public function ajaxEmailChek($id){
        $customer = Customer::where('email_address',$id)->first();
        if ($customer){
            echo '<span class="text-danger"><strong>Already Exist!! </strong></span>';
        }else{
            echo '<span class="text-success"><strong>Available!! </strong></span>';
        }
    }

}
