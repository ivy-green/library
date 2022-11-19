<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;        
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    public function getLogout() {
        Auth::logout();
        return redirect()->route('getLogin');
      }

      public function getLogin(){
        if(Auth::check()) {
            return redirect(RouteServiceProvider::HOME);
        } else {
            return view('auth.login');
        }
        // return redirect(RouteServiceProvider::HOME)->with('success', 'Đã đăng nhập thành công');
      }

      public function postLogin(Request $request){
        $login = [
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
        ];

        if(Auth::attempt($login)) {
            return redirect('/home');
        } else {
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không hợp lệ');
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function email(){
        return 'email';
    }
}
