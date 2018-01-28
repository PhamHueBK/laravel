<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
        
    }*/

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $check = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
    	if ($check) {
    		return redirect()->intended('admin/dashboard');
    	} else {
    		dd('Tai khoan khong dung');
    	}
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
