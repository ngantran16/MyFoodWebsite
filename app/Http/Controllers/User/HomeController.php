<?php

namespace App\Http\Controllers\User;

use App\Detail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Product;

class HomeController extends Controller
{
    function index(){
        $products = Product::all();
        return view('user.home',['products' => $products]);
    }
    function details($id){
        $details = DB::table('details')->where('product_id',$id)->get();
        $product = Product::find($id);
        return view('user.detail',['details'=>$details, 'product' => $product]);
    }
}
