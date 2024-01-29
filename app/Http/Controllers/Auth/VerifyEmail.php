<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class VerifyEmail extends Controller
{
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if ($user) {
            $user->email_verified = true;
            $user->save();
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Invalid verification token.');
            return redirect()->route('email-verification');
        }
    }
}
