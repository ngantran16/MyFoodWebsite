<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    function index(){
        $users = DB::table('users')->get();
        // $products = DB:: table('products')->get();
        return view("admin.dashboard",['users'=>$users]);
    }
}
