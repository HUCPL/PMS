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
        Schema::create('property_units', function (Blueprint $table) {
            $table->id('unit_id');
            $table->string('unit_name')->nullable();
            $table->unsignedBigInteger('propertyID')->nullable();
            $table->foreign('propertyID')->references('id')->on('on_board_property')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_units');
        $table->dropSoftDeletes();
    }
};
