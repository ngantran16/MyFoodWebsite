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
use App\Category;

class HomeController extends Controller
{
    function index(Request $request ){
        $page = $request->page;
        if(isset($request->method)){
            if($request->method=="asc"){
                $products= $this->sortasc()->skip($page * 6)->take(6);
            }
            else{
                if($request->method=="des")$products= $this->sortdesc()->skip($page * 6)->take(6);
            }
        }else{
            $products = Product::all()->skip($page * 6)->take(6);
        }

        if($products->isEmpty()){
            $products = Product::all()->take(6);
            return redirect('/home/?page=0');
        }else if($page<0){
            $totalPage = round(count(Product::all())/5)-1;
            return redirect('/home/?page='.$totalPage);
        }

        if (isset(Auth::user()->id)){
            $id_user = Auth::user()->id;
            $cart = Cart::where('id_user','=',$id_user)->get();
            $quantity = 0;
            foreach($cart as $item){
                $quantity += $item->quantity;
            }
        } else{
            $quantity = 0;
        }

        $request->session()->put('quantity', $quantity);

        $categories = Category::all();
        $request->session()->put('categories', $categories);

        return view('user.home',['products' => $products, "page" => $page]);
    }

    function details($id){
        $details = Detail::where('product_id',$id)->get();
        $product = Product::find($id);
        return view('user.detail',['details'=>$details, 'product' => $product]);
    }
    function getSearch(Request $request){
        $result = $request->result;
        $products = Product::where('name','like','%'.$result.'%')->take(12)->paginate(6);
        return view('user.search',['products'=>$products, 'result'=>$result]);
    }

    function sortdesc(){
        $products = Product::select('id','name','image','price','quantity','star')->orderBy('price', 'desc')->get();
        return $products;
    }
    function sortasc(){
        $products = Product::select('id','name','image','price','quantity','star')->orderBy('price')->get();
        return $products;
    }
    function showProductCategory($id){
        $products = Product::where('category_id',$id)->get();
        $category = Category::find($id);
        return view('user.category',['products' => $products, 'category' => $category->name]);
    }
}
