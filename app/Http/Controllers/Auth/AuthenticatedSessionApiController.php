<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
//
class AuthenticatedSessionApiController extends Controller
{

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $user = User::where('email',$request['email'])->first();
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        return response()->json(['message' => 'Login Successful', 'token' => $token]);

        // return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('api')->logout();

        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Logout Successful']);
    }
}
