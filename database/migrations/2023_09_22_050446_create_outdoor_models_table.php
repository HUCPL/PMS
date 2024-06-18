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
        Schema::create('outdoor_models', function (Blueprint $table) {
            $table->id('outdoor_id');
            $table->string('outdoor_name');
            $table->unsignedBigInteger('master_category');
            $table->foreign('master_category')->references('category_id')->on('category_models')->onDelete('cascade');
            $table->longText('tags')->nullable();
            $table->string('imageName')->nullable();
            $table->string('imagePath')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outdoor_models');
        $table->dropSoftDeletes();
    }
};
