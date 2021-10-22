<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (auth('customers')->check()) {
            return redirect()->back();
        } else {
            return view('web.auth.login');
        }
    }

    public function login(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('customers')->attempt($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        auth('customers')->logout();
        return redirect()->route('home');
    }
}
