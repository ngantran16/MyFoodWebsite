<?php

namespace App\Http\Controllers\User;

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
}
