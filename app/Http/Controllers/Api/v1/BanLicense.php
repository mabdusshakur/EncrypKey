<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BanLicenseRequest;

class BanLicense extends Controller
{
    public function banLicense(BanLicenseRequest $request)
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
        if (!$license) {
            return response()->json([
                'status' => 'error',
                'message' => 'License not found'
            ], 404);
        }

        // Check if the license is banned
        $isBanned = $license->is_banned;
        $banReason = $license->ban_reason;
        if ($isBanned) {
            return response()->json([
                'status' => 'error',
                'message' => 'License is banned already',
                'ban_reason' => $banReason
            ], 403);
        }

        $license->is_banned = true;
        $license->ban_reason = $request->ban_reason;
        $license->save();
        return response()->json([
            'status' => 'success',
            'message' => 'License has been banned'
        ], 200);
    }
}
