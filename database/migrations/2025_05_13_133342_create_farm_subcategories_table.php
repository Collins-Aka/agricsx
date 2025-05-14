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
        Schema::create('farm_subcategories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('subcategory_name');
            $table->foreignUuid('farm_category_id')->index()->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('farm_category_id')->references('id')->on('farm_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_subcategories');
    }
};
