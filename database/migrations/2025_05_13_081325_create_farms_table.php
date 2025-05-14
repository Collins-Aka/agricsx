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
        Schema::create('farms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('farm_name', 200)->nullable();
            $table->string('farm_code', 20)->nullable();
            $table->string('farm_size')->nullable();
            $table->enum('farm_ownership',['Individual', 'Organization'])->default('Individual');
            $table->boolean("farm_verified")->comment("0: Not Verified, 1: Verified")->default(false);
            $table->boolean('farm_status')->comment("1: Active, 0: Inactive")->default(false);
            $table->string('farm_crop')->nullable();
            $table->string('farm_plan', 200)->nullable();
            $table->foreignUuid('country_id')->index()->nullable();
            $table->foreignUuid('state_id')->index()->nullable();
            $table->foreignUuid('city_id')->index()->nullable();
            $table->string('timezone')->default('Africa/Douala');
            //farm location
            $table->decimal('latitude', 10, 8)->default(14.9124336);
            $table->decimal('longitude', 11, 8)->default(16.7872709);
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farms');
    }
};
