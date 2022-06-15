<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $roles = Role::all('role');

        return view('auth.index', compact(
            'roles'
        ));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|required_with:confirm_password|same:confirm_password",
            "confirm_password" => "required",
            "role" => "required|exists:roles,role"
        ]);

        User::create($validated);

        if (Auth::attempt($validated)) {
            return redirect()->intended(route(auth()->user()->role . ".index"))->with('success', 'User registered.');
        }

        return back();
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email|exists:users,email",
            "password" => "required",
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route(auth()->user()->role . ".index"))->with('success', 'User authenticated.');
        }

        return back();
    }

    public function logout()
    {
        Auth::logout();

        return back();
    }
}
