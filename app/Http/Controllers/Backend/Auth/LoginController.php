<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('backend.login');
    }
    public function postlogin(LoginRequest $request){
    $email = $request->email;
    $password = $request->password;
    if(Auth::attempt(['email' => $email, 'password' => $password])){
        return redirect()->route('admin.index');
    }else{
        return redirect()->back()->with('thong-bao','tên đăng nhập hoặc mật khẩu không đúng')->withInput();
    }
    }
    
}
