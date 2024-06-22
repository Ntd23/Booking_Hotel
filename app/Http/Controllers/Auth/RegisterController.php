<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    /**
     * Get a validator for an incoming registration request.
     *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
     */
    public function register(Request $request)
    {
        if($request->isMethod('POST')) {
          $data= $request->all();
        $rules= [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'phone'=> ['required', 'numeric', 'digits_between:10,12', 'unique:users'],
          'password' => ['required', 'string', 'min:6', 'confirmed', 'regex:/[a-zA-Z]/', 'regex:/[0-9]/', 'regex:/[@!.\-]/'],
          'password_confirmation' => ['required'],
        ];
        $customMsg= [
          'name.required'=> 'Vui lòng nhập tên!!',
          'email.required'=> 'Vui lòng nhập email!!',
          'email.unique'=> 'Email đã tồn tại!',
          'email.email'=> 'Email không đúng định dạng',
          'phone.unique'=> 'Số điện thoại đã tồn tại!',
          'phone.required'=> 'Vui lòng nhập số điện thoại!!',
          'phone.digits_between:10,12'=> 'Số điện thoại tối thiểu 10 và tối đa 12 chữ số. Nhập lại!',
          'phone.numeric'=> 'Số điện thoại phải là chữ số. Nhập lại!',
          'password.required'=> 'Vui lòng nhập mật khẩu!!',
          'password.min'=> 'Mật khẩu ít nhất 6 kí tự. Nhập lại!',
          'password.regex'=> 'Mật khẩu bao gồm chữ, số, và các kí tự: !, @, .',
          'password_confirmation.required'=> 'Vui lòng xác nhận mật khẩu!!',
          'password.confirmed'=> 'Mật khẩu không khớp!',
        ];
        $request->validate($rules, $customMsg);
        $user= new User;
        $user->name= $data['name'];
        $user->email= $data['email'];
        $user->phone= $data['phone'];
        $user->password= $data['password'];
        $user->save();
        Auth::login($user);// tự động đăng đăng nhập sau khi đăng ký thành công
        if ($request->ajax()) {
          return response()->json([
              'status' => true,
              'message' => 'Bạn đã đăng ký tài khoản thành công.',
          ]);
      }

        Session::flash('success_msg','Bạn đã đăng ký tài khoản thành công.');
        return redirect('/');
      }
    }
}
