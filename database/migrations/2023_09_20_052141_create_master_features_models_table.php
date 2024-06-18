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
        Schema::create('master_features_models', function (Blueprint $table) {
            $table->id('features_id');
            $table->string('features_name');
            $table->unsignedBigInteger('master_category');
            $table->foreign('master_category')->references('category_id')->on('category_models')->onDelete('cascade');
            // $table->longText('tags')->nullable();
            $table->longText('features_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_features_models');
        $table->dropSoftDeletes();
    }
};
