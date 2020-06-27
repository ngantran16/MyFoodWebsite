<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderRequest;
use Illuminate\Foundation\Http\FormRequest;
use App\Cart;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    function index(){
        $id_user = Auth::user()->id;
        $carts = Cart::where('id_user','=',$id_user)->get();

        foreach($carts as $cart){
            $cart->products;
        }
        return view('user.order',['cart' => $carts]);
    }

    function paymentProduct(OrderRequest $request){

        $city = $request->city;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $address = $request->address;
        $phonenumber = $request->phonenumber;
        $email = $request->email;

        $request->validated();
        $id_user = Auth::user()->id;
        $name = $firstname.'  '.$lastname;
        $address = $address.'  '.$city;

        $carts = Cart::where('id_user','=',$id_user)->get();

        foreach($carts as $cart){
            $cart->products;
        }

        $pros = "";
        $total = 0;
        foreach($carts as $cart){
             foreach($cart->products as $item){
                 $array = json_encode($item->name,true);
                 $pros .= $array.',';
                 $total += $cart->quantity * $item->price;

                 //update quantity
                 $product = Product::find($item->id);
                 $product->quantity = $item->quantity - $cart->quantity;
                 $product->save();
             }
        }
        $order = new Order;
        $order->id_user = $id_user;
        $order->name = $name;
        $order->product = $pros;
        $order->address = $address;
        $order->email = $email;
        $order->phone_number = $phonenumber;
        $order->total = $total;
        $order->status = 'checking';
        $order->save();

        $carts = Cart::where('id_user','=',$id_user)->delete();

        return redirect('/home');
    }

}
