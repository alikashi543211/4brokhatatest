<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'employee_ad_id' => [
                'required',
                'string',
                'max:100',
                'regex:/^(?=.*[A-Za-z])[A-Za-z0-9_-]+$/',
                'not_regex:/<\s*script\b/i',
                'not_regex:/<\?|\?>/',
            ],
            'password' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        $credentials = [
            'employee_ad_id' => $validated['employee_ad_id'],
            'password' => $request->input('password'),
            'is_active' => 1,
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors(['employee_ad_id' => 'Invalid credentials.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}

