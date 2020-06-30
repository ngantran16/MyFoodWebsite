<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Foundation\Http\FormRequest;
use App\User;

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

    $user = new User;
    $user->username = $username;
    $user->password = $hashPassword;
    $user->email = $email;
    $user->address = $address;
    $user->role = $role;
    $user->save();

    return redirect("auth/login");
   }
}
