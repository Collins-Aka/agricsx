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
        Schema::create('farmers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('fullname');
            $table->string('email')->nullable()->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->string('pin')->nullable();
            $table->string('password');
            $table->string('farm_id')->nullable();
            $table->json('farm_produce')->nullable();
            $table->longText('avatar')->nullable();
            $table->boolean('status')->comment('1 = Active, 0 == Banned')->default(true);
            $table->text('address')->nullable();
            $table->string('x_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('linkedin_id')->nullable();
            $table->string('api_token');
            $table->boolean('email_verified')->comment('1 == verified, 0 == Not verified')->default(false);
            $table->boolean('sms_verified')->comment('1 == verified, 0 == Not verified')->default(false);
            $table->boolean('kyc_verified')->comment("0: Default, 1: Approved, 2: Pending, 3:Rejected")->default(0);
            $table->string('ver_code')->nullable();
            $table->timestamp('ver_code_send_at')->nullable();
            $table->boolean('two_factor_verified')->default(false);
            $table->boolean('two_factor_status')->default(false);
            $table->string('two_factor_secret')->nullable();
            $table->boolean('is_2FA')->comment("0:Inactive, 1: Active")->default(false);
            $table->string('device_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->index('email');
            $table->index('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
