<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class VerifyEmail extends Controller
{
    public function verify($token)
    {
        dd($token);
    }
}
