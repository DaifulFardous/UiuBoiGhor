<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request){
        $order = new Order();
        $order->name = $request->name;
        $order->address = $request->address;
        $order->shipping_address = $request->shipping_address;
        $order->zip = $request->zip;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->total_price = $request->total_price;
        $order->payment_type = $request->payment_type;
        $order->traking_no = 'boiGhor'.rand(1111,9999);
        $order->save();

        $cartItems = Cart::where('user_id',Auth::user()->id)->get();
        foreach($cartItems as $item){
            OrderItems::create([
                'order_id'=>$order->id,
                'book_id'=>$item->book_id,
                'qty'=>$item->qty,
                'price'=>$item->books->selling_price
            ]);
        }
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        Cart::destroy($cart);
        return redirect('/')->with('status', 'Order Placed Successfully');

    }
    public function index(){
        $orders = Order::where('status','0')->get();
        return view('admin.order.orders',compact('orders'));
    }
    public function view($id){
        $orders = Order::where('id', $id)->first();
        return view('admin.order.order-view',compact('orders'));
    }
}
