<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'license_key',
        'is_used',
        'is_banned',
        'ban_reason',
        'application_id',
        'hwid_hash',
        'ip_address',
        'mac_address',
        'country',
        'isp',
        'expires_at',
        'banned_at',
        'last_login_at'
    ];
}
