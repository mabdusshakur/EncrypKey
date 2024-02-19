<?php

use App\Http\Controllers\Api\V1\BanLicense;
use App\Http\Controllers\Api\v1\CheckLicense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/check-license', [CheckLicense::class, 'checkLicense']);
Route::post('/ban-license', [BanLicense::class, 'banLicense']);
