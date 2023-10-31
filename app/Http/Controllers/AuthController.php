<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->wantsJson()) {

                if(auth()->user()->role === 1) {
                    return response()->json(['isAdmin' => true]);
                }

                return response()->json(['isAdmin' => false]);
            }

            return redirect()->intended('/');
        }

        if ($request->wantsJson()) {
            return response()->json(['errors' => [
                'email' => ['The provided credentials do not match our records.']
            ]], status: 422);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
