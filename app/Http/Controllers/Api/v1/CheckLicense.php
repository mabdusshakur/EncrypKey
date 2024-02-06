<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckLicenseRequest;

class CheckLicense extends Controller
{
    public function checkLicense(CheckLicenseRequest $request)
    {
        $request->validated();
        return response()->json([
            'owner_id' => $request->owner_id,
            'secret' => $request->secret,
            'name' => $request->name,
        ], 200);
    }
}
