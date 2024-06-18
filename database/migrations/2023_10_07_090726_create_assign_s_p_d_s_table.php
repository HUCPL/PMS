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
        Schema::create('assign_s_p_d_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propertyID')->nullable();
            $table->foreign('propertyID')->references('id')->on('on_board_property')->onDelete('cascade');
            $table->unsignedBigInteger('deptID')->nullable();
            $table->foreign('deptID')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('servicesID')->nullable();
            $table->foreign('servicesID')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('superVisorID')->nullable();
            $table->foreign('superVisorID')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_s_p_d_s');
        $table->dropSoftDeletes();
    }
};
