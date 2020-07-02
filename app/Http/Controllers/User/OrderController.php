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
        $discount = $request->session()->get('discount');

        $carts = Cart::where('id_user','=',$id_user)->get();
        foreach($carts as $cart){
            $cart->products;
        }

        $total = 0;
        $i =0;
        $arr=[];
        foreach($carts as $cart){
            $arr[$i] = new Product;
            foreach($cart->products as $item){
                $arr[$i]->id = $item->id;
                $arr[$i]->name = $item->name;
                $arr[$i]->price = $item->price;
                $arr[$i]->quantity = $cart->quantity;
                $total += $cart->quantity * $item->price;
                //update quantity
                $product = Product::find($item->id);
                $product->quantity = $item->quantity - $cart->quantity;
                $product->save();
             }
            $i++;
        }
        $total = $total - ($total *  $request->session()->get('discount'))/100;
       $list=[];
        for($j =0; $j<$i; $j++){
            array_push($list,$arr[$j]);
        }
        $productsInString = json_encode($list);

        $order = new Order;
        $order->id_user = $id_user;
        $order->name = $name;
        $order->product = $productsInString;
        $order->address = $address;
        $order->email = $email;
        $order->phone_number = $phonenumber;
        $order->total = $total;
        $order->discount = $discount;
        $order->status = 'checking';
        $order->save();

        $carts = Cart::where('id_user','=',$id_user)->delete();
        $request->session()->forget('discount');

        return redirect('/home');
    }

}
