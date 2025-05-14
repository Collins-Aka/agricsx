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
        Schema::create('admins', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('fullname');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('password');
            $table->string('user_type', 20)->default("ADMIN");
            $table->longText('avatar')->nullable();
            $table->foreignUuid('country_id')->index()->nullable();
            $table->foreignUuid('state_id')->index()->nullable();
            $table->foreignUuid('city_id')->index()->nullable();
            $table->integer('zip_postal')->nullable();
            $table->text('address', 500)->nullable();
            $table->string('device_id', 255)->nullable();
            $table->boolean('status')->default(false);
            $table->text('device_info', 500)->nullable();
            $table->timestamp("last_logged_in")->nullable();
            $table->timestamp("last_logged_out")->nullable();
            $table->boolean("login_status")->default(false);
            $table->timestamp("notification_clear_at")->nullable();
            $table->timestamps();
        
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
