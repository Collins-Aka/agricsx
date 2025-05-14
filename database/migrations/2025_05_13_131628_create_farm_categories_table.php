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
        Schema::create('farm_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('farm_category_name');
            $table->foreignUuid('farm_id')->index()->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('farm_id')->references('id')->on('farms')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_categories');
    }
};
