<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller

{
    public function index(){
        $users = User::paginate(2);
        return view('backend.user.listuser',compact('users'));
    }
    public function create(){
       return view('backend.user.adduser');
    }
    public function store(AddUserRequest $request){
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->name = $request->full;
        $user->level = $request->level;

        $user->save();

        return redirect()->route('user')->with('success','Thêm người dùng thành công');
    }
    public function edit($id){
        // $Users = User::all();
        $User = User::find($id);
        return view('backend.user.edittuser',compact('users'));

    }
    public function delete($id){
        $Users = User::find($id);
        $Users->delete();
        return redirect()->back()->with('success','Đã xóa danh mục thành công');
    }

}
