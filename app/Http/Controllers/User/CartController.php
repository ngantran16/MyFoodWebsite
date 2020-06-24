<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function index(){
        $id_user = Auth::user()->id;
        $cart = DB::table('carts')
                    ->join('users','carts.id_user','=','users.id')
                    ->join('products','carts.product_id','=','products.id')
                    ->where ('users.id','=',$id_user)
                    ->select('products.id','products.image','products.name','products.price', 'carts.quantity')
                    ->get();
        return view("user.cart",['carts'=>$cart]);
    }
    function addToCart($id_pro){
        $id_user = Auth::user()->id;
        $cart = DB::table('carts')->where('product_id','=',$id_pro)->first();
        if (!$cart){
            DB::table('carts')->insert(
                ['id_user'=>$id_user,'product_id'=>$id_pro, 'quantity' => 1]
            );
        }
        else
        {
            $quantity = $cart->quantity +1;
            DB::table('carts')
            ->where('product_id','=',$id_pro)
            ->update(
                ['quantity' => $quantity]
            );
        }

        return redirect ('cart');
    }

    function destroyCartPro($id_product){
        DB::table('carts')->where ('product_id','=',$id_product)->delete();
        return redirect('cart');
    }
}
