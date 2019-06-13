<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class Login extends Controller
{
    public function __construct() {
        //只允许未登录用户访问的动作
        //只让未登录用户访问登录页面
        $this->middleware('guest', [
            'only'=>['create']
        ]);
    }


    //显示登录页面
    public function create() {

        return view('admin.login.create');
    }

    //登录数据提交
    public function store(Request $request) {

        $data = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);


        if (Auth::attempt($data, $request->has('remember'))) {
            // 该用户存在于数据库，且邮箱和密码相符合
            return redirect()->route('admin', [Auth::user()]);
        }else{
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }

    }

    //退出
    public function destroy() {
        Auth::logout();
        session()->flash('success', '全世界最靓的仔，您已成功退出！');
        return redirect('login');
    }


}
