<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PubilcController extends Controller
{
    public function login()
    {
        return view('admin.public.login');
    }

    //验证登录
    public function check(Request $request)
    {
        //自动验证
        $this->validate($request,[
           'username'=>'required|min:2|max:20',
            'password'=>'required|min:6',
            'captcha'=>'required|size:6|captcha'
        ]);
    }
}
