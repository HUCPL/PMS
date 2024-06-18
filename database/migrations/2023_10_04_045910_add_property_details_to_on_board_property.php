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
            $table->longText('propertyAddress')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->bigInteger('zipcode')->nullable();
            $table->string('state')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('near_by')->nullable();
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
