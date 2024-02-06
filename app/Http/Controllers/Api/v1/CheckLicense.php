<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckLicenseRequest;

class CheckLicense extends Controller
{
    public function checkLicense(CheckLicenseRequest $request)
    {
        $request->validated();

        // Check if the owner exists
        $owner = User::where('owner_id', $request->owner_id)->first();
        if (!$owner) {
            return response()->json([
                'status' => 'error',
                'message' => 'Owner not found'
            ], 404);
        }

        // Check if the application exists
        $application = Application::where('name', $request->name)->where('secret', $request->secret)->first();
        if (!$application) {
            return response()->json([
                'status' => 'error',
                'message' => 'Application not found'
            ], 404);
        }
        
        // Check if the owner has the application
        $ownerHasApplication = $owner->applications->contains($application->id);
        if (!$ownerHasApplication) {
            return response()->json([
                'status' => 'error',
                'message' => 'Owner does not have this application'
            ], 404);
        }

        // Check if the license exists
        $license = $application->licenses->where('license_key', $request->license_key)->first();

        return response()->json([
            $license
        ], 200);
    }
}
