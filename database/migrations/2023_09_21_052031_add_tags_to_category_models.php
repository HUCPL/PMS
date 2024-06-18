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
        Schema::table('category_models', function (Blueprint $table) {
            $table->longText('tags')->nullable();
            $table->integer('isFeatured')->comment('1 for no and 0 for yes')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('category_models', function (Blueprint $table) {
            //
        });
    }
};
