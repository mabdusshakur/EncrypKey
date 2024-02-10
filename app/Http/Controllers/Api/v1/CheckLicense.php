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
                'message' => 'License is banned',
                'ban_reason' => $banReason
            ], 403);
        }

        // Check if the license is expired
        $isExpired = $license->expires_at < now();
        if ($isExpired) {
            return response()->json([
                'status' => 'error',
                'message' => 'License is expired'
            ], 403);
        }

        // Check if the license is used on another device
        $clientHwid = $request->hwid;
        $isUsed = $license->is_used;
        if ($isUsed) {
            $hwid_hash = $license->hwid_hash;
            if ($clientHwid !== $hwid_hash) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'License is already used on another device'
                ], 403);
            }
        }

        // Activate the license
        if (!$license->is_used) {
            $license->update([
                'is_used' => true,
                'hwid_hash' => $clientHwid,
                'ip_address' => $request->ip_address,
                'mac_address' => $request->mac_address,
                'country' => $request->country,
                'isp' => $request->isp,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'License activated successfully on this device'
            ], 200);
        }
        
        return response()->json([
            'status' => 'success',
            'message' => 'License is valid'
        ], 200);
    }
}
