<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ConfirmAccountController extends Controller
{
    public function confirmAccount($token)
    {
        $user = User::where('confirmation_token', $token)->first();
        if (!$user) {
            abort(404, 'Invalid token.');
        }
        return view('auth.confirm-account', compact('user'));
    }

    public function confirmAccountSubmit(Request $request)
    {
        $request->validate([
            'token' => 'required|string|size:60',
            'password' => 'required|string|min:8|max:16|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/',
        ]);

        $user = User::where('confirmation_token', $request->token)->first();
        $user->password = bcrypt($request->password);
        $user->confirmation_token = null;
        $user->email_verified_at = now();
        $user->save();

        return view("auth.welcome")->with('user', $user);
    }
}
