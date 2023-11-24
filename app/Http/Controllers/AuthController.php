<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->wantsJson()) {
                $user = auth()->user();
                return response()->json(['user' =>  $user, 'roles' => $user->roles]);
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

    public function register(RegisterRequest $request)
    {
        $data = $request->only(['user_name', 'full_name', 'email', 'password', 'phone_number', 'address']);
        $data['password'] = bcrypt($data['password']);
        try {
            User::create($data);
            if ($request->wantsJson()) {
                return response()->json(['message' => 'success'], status: 200);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            if ($request->wantsJson()) {
                return response()->json(['message' => $e->getMessage()], status: 500);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.item.create');
    }
}
