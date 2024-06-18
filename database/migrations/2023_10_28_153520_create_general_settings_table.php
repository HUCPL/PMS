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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('adminlogo_name')->nullable();
            $table->string('adminlogo_path')->nullable();
            $table->string('favicon_name')->nullable();
            $table->string('favicon_path')->nullable();
            $table->longText('meta_tags')->nullable();
            $table->longText('meta_description')->nullable();
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
        $table->dropoftDeletes();
    }
};
