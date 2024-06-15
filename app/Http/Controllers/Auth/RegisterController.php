<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    
    public function showFormRegister () {
       return view('auth.register');
    }

    //hàm Đăng ký
    public function register (Request $request) {
    
        // Xác thực dữ liệu từ request
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        // Mã hóa mật khẩu (dòng này đang bị comment)
        // $data['password'] = bcrypt($data['password']);
        
        // Tạo người dùng mới với dữ liệu đã xác thực
        $user = User::query()->create($data);
        
        // Đăng nhập người dùng mới tạo
        Auth::login($user);
        
        // Tái tạo session cho an toàn
        request()->session()->regenerate();
        
        // Chuyển hướng đến trang chủ
        return redirect()->intended('/home');
    }
    
}
