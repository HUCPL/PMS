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
        Schema::table('on_board_property', function (Blueprint $table) {
            $table->unsignedBigInteger('OwnerID');
            $table->foreign('OwnerID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('on_board_property', function (Blueprint $table) {
            //
        });
    }
};
