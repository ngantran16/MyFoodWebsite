<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index(){
        return view("auth.login");
    }
    function login(Request $request){
        $username = $request->username;
        $password = $request->password;
        if(Auth::attempt(["username"=> $username,"password"=>$password])){
            $user = Auth:: user();
            if($user->role =="admin"){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('homepage');
            }
        }else{
            return redirect()->route("auth.login",["error"=>"Invallid username or password"]);
        }
    }

        function logout(){
        Auth:: logout();
        return redirect('home');

    }
}
