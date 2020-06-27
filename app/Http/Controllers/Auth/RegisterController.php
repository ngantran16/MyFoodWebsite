<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterController extends Controller
{
   function index(){
    return view('auth.register');
   }

   function register(RegisterRequest $request){
    $username= $request->username;
    $password =$request->password;
    $email = $request->email;
    $address = $request->address;
    $role="user";
    $request->validated();

    $hashPassword = Hash::make($password);

    DB::table("users")->insert(['username'=>$username,'password'=>$hashPassword,'email'=>$email,'address'=>$address,'role'=>$role]);
    return redirect("auth/login");
   }
}
