<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

  public function showFormLogin()
  {
    return view('auth.login');
  }


  public function login(Request $request)
  {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // dd( $credentials);
    // check user và pass
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/home'); 
        //intended dung để đại khái khi vi dụ 
        // khi bạn đang mua hàng gnuwng chưa đăng nhập bạn nhấn vào thêm vào giỏ hàng thì nó sẽ về 
        // trang đăng nhập sau khi đn xong thì nó sẽ về trang ban nãy để tiếp tục thêm sản phảm còn ko tìm thấy nó sẽ trả về hôm 
    }

    return back()->withErrors([
        'email' => 'email không đúng định dạng',
    ])->onlyInput('email'); // onlyInput để inpot dữ liệu lên dù nhập lại lần 2 
    // nó sẽ in lại những gì đã nhập lần trước
}


  public function logout()
  {
   Auth::logout();
   request()->session()->invalidate();//invalidate xóa hết tất cả các session và resrt lại
   return redirect('/');
  }
}
