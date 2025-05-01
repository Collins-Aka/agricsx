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
        Schema::create('medical_staffs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('fullname');
            $table->string('email')->nullable()->unique()->index();
            $table->string('phone_number')->nullable()->unique()->index();
            $table->string('pin')->nullable();
            $table->string('password');
            $table->longText('avatar')->nullable();
            $table->boolean('status')->comment('1 = Active, 0 == Banned')->default(true);
            $table->text('address')->nullable();
            $table->string('x_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('linkedin_id')->nullable();
            $table->string('api_token');
            $table->boolean('medical_type')->comment('1: Veterinarian, 2: Medical doctor, 3: Nurse')->default(1);
            $table->boolean('email_verified')->comment('1 == verified, 0 == Not verified')->default(false);
            $table->boolean('sms_verified')->comment('1 == verified, 0 == Not verified')->default(false);
            $table->boolean('medicalstaff_license')->comment('1 = Pending, 2: Approved, 0: Rejected')->default(1);
            $table->longText('medicalstaff_cert')->nullable()->comment('Medical staff certificate');
            $table->string('medicalstaff_cert_image')->nullable()->comment('Medical staff certificate image');
            $table->string('medicalstaff_cert_type')->nullable()->comment('Medical staff certificate type');
            $table->string('medicalstaff_cert_number')->nullable()->comment('Medical staff certificate number');
            $table->string('medicalstaff_quiz')->comment('Medical staff quiz')->nullable();
            $table->boolean('medicalstaff_quiz_status')->comment('1 = Pending, 2: Approved, 0: Rejected')->default(1);
            $table->boolean('medicalstaff_cert_status')->comment('1 = Pending, 2: Approved, 0: Rejected')->default(1);
            $table->boolean('kyc_verified')->comment("0: Default, 1: Approved, 2: Pending, 3:Rejected")->default(0);
            $table->string('ver_code')->nullable();
            $table->timestamp('ver_code_send_at')->nullable();
            $table->boolean('two_factor_verified')->default(false);
            $table->boolean('two_factor_status')->default(false);
            $table->string('two_factor_secret')->nullable();
            $table->boolean('is_two_factor_active')->comment('0: Inactive, 1: Active')->default(false);
            $table->string('device_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_staffs');
    }
};
