<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->locked) {
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ với quản trị viên để biết thêm thông tin.']);
        }

        if ($user->role == \App\Models\User::ROLE_ADMIN) {
            return redirect('/admin');
        }

        if (!$user->email_verified_at) {
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Tài khoản của bạn chưa được kích hoạt.']);
        }

        if (!Hash::check($request->password, $user->password)) {
            Auth::logout();
            return redirect('/login')->withErrors(['password' => 'Mật khẩu không chính xác. Vui lòng thử lại.']);
        }

        return redirect('/');
    }
}
