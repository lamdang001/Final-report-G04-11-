<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the user form login
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('web.login');
    }

    /**
     * Handle login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleLogin(Request $request)
    {
        try {
            $result = Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true);
            if ($result) {
                return redirect()->route('web.top');
            } else {
                $validator = \Validator::make([], []);
                $validator->errors()->add('email', 'Email/Mật khẩu không đúng');

                return redirect()->back()->withErrors($validator)->withInput();
            }
        } catch (\Throwable $e) {
            \Log::info($e->getMessage());
        }
    }

    /**
     * Show the user register form
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegisterForm()
    {
        return view('web.register');
    }

    /**
     * Register account
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleRegister(Request $request)
    {
        if($request->input('password') === $request->input('repassword')) {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone')
            ]);
            return redirect()->route('web.auth.login')->with('success','Đăng ký thành công');
        }else {
            return redirect()->back()->with('invalid','Mật khẩu không trùng khớp');
        }
    }

    /**
     * Logout
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {

        Auth::logout();

        return redirect()->route('web.auth.login');
    }
}
