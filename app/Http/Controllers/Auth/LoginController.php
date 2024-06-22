<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/admin';
    // protected function redirectTo() {
    //   if(Auth::check()) {
    //     if(Auth::user()->role=='admin') {
    //       return '/admin';
    //     }else {
    //       return '/';
    //     }
    //   }
    //   return '/';
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request) {
      if($request->isMethod('POST')) {
        $rules= [
          'email' => 'required|email',
          'password' => 'required',
        ];
        $customMSg= [
          'email.required'=> 'Vui lòng nhập email!!',
          'email.email'=> 'Email không đúng định dạng',
          'password.required'=> 'Vui lòng nhập mật khẩu!!',
        ];
        $request->validate($rules, $customMSg);
        $data= $request->validate($rules, $customMSg);
        if(Auth::attempt($data)) {
          if(!empty($_POST['remember'])) {
            setcookie('email', $_POST['email'], time()+ 3600);
            setcookie('password',Hash::make($_POST['password']), time()+ 3600);
          }else {
            setcookie('email', '');
            setcookie('password', '');
          }
          $redirect = Auth::user()->role == 'admin' ? '/admin' : '/';
          if ($request->ajax()) {
              return Response::json([
                  'status' => true,
                  'redirect' => $redirect,
              ]);
          }
          Session::flash('success_msg', 'Đăng nhập thành công!');
          return redirect()->to($redirect);
        }else {
          if ($request->ajax()) {
            return Response::json([
                'status' => false,
                'message' => 'Email hoặc mật khẩu không chính xác!',
            ]);
        }
          return redirect()->back()->withInput()->withErrors(['error' => 'Email hoặc mật khẩu không chính xác!']);
        }
      }
      return redirect('/');
    }
}
