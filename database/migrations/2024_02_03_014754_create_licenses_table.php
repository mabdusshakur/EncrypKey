<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('license_key');
            $table->boolean('is_used')->default(false);
            $table->boolean('is_banned')->default(true);
            $table->string('ban_reason')->nullable();
            $table->foreignId('application_id')->references('id')->on('applications')->cascadeOnDelete();
            $table->string('hwid_hash')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('country')->nullable();
            $table->string('isp')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('banned_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
