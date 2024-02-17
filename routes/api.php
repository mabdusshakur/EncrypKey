<?php

use App\Http\Controllers\Api\v1\CheckLicense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/check-license', [CheckLicense::class, 'checkLicense']);