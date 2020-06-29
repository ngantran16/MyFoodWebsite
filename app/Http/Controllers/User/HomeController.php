<?php

namespace App\Http\Controllers\User;

use App\Detail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;

class HomeController extends Controller
{
    function index(Request $request){
        $page = $request->page;
        $products = Product::all()->skip($page * 6)->take(6);
        if($products->isEmpty()){ //Nếu photo lớn hơn số lượng trong database sẽ trả về 0
            $products = Product::all()->take(6);
            return redirect('/home/?page=0');
        }else if($page<0){
            $totalPage = round(count(Product::all())/5)-1;
            return redirect('/home/?page='.$totalPage);
        }
        $id_user = Auth::user()->id;
        $cart = Cart::where('id_user','=',$id_user)->get();
        $quantity = 0;
        foreach($cart as $item){
            $quantity += $item->quantity;
        }
        $request->session()->put('quantity', $quantity);

        $products = $this->sortdesc();
        return view('user.home',['products' => $products, "page" => $page]);
    }
    function details($id){
        $details = DB::table('details')->where('product_id',$id)->get();
        $product = Product::find($id);
        return view('user.detail',['details'=>$details, 'product' => $product]);
    }
    function getSearch(Request $request){
        $result = $request->result;
        $products = Product::where('name','like','%'.$result.'%')->take(12)->paginate(6);
        return view('user.search',['products'=>$products, 'result'=>$result]);
    }

    function sortdesc(){
        $products = Product::all()->orderBy('price')->get();
        return $products;
    }

}
