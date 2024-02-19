<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BanLicense extends Controller
{
    public function banLicense()
    {
        return response()->json([
            'message' => 'License has been banned'
        ]);
    }
}
