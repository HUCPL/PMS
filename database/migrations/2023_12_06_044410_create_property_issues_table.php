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
        Schema::create('property_issues', function (Blueprint $table) {
            $table->id();
            $table->string('propUniqueID');
            $table->string('property_issues');
            $table->integer('isActive')->comment('0 for active ,1 for inActive')->default(0);
            $table->integer('isDelete')->comment('0 for Delete ,1 for not Deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_issues');
    }
};
