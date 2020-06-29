<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class CartController extends Controller
{
    function index(Request $request){
        $id_user = Auth::user()->id;
        $cart = DB::table('carts')
                    ->join('users','carts.id_user','=','users.id')
                    ->join('products','carts.product_id','=','products.id')
                    ->where ('users.id','=',$id_user)
                    ->select('products.id','products.image','products.name','products.price', 'carts.quantity')
                    ->get();

        $cts = Cart::where('id_user','=',$id_user)->get();
        $quantity = 0;
        foreach($cts as $item){
            $quantity += $item->quantity;
        }
        $request->session()->put('quantity', $quantity);

        return view("user.cart",['carts'=>$cart]);
    }
    function addToCart($id_pro){
        $id_user = Auth::user()->id;
        $cart = DB::table('carts')->where('product_id','=',$id_pro,'and','id_user','=',$id_user)->first();
        if (!$cart){
            DB::table('carts')->insert(
                ['id_user'=>$id_user,'product_id'=>$id_pro, 'quantity' => 1]
            );
        }
        else
        {
            $quantity = $cart->quantity +1;
            DB::table('carts')
            ->where('product_id','=',$id_pro,'and','id_user','=',$id_user)
            ->update(
                ['quantity' => $quantity]
            );
        }

        return redirect ('home')->with('alert', 'Add to cart successful!');
    }

    function destroyCartPro($id_product){
        DB::table('carts')->where ('product_id','=',$id_product)->delete();
        return redirect('cart');
    }

    function updateQuantity($id, Request $request){
        $quantity = $request->input("quantity");
        $id_user = Auth::user()->id;
        if (isset($_POST['plus'])){
            $quantity = $quantity + 1;
        }
        elseif (isset($_POST['minus'])){
            if ($quantity == 1){
                $quantity = 1;
            }else{
                $quantity = $quantity - 1;
            }
        }

        $cart = Cart::where('product_id','=',$id, 'and', 'user_id','=',$id_user)->first();
            $cart->quantity = $quantity;
            $cart->save();
        return redirect('cart');
    }
}
