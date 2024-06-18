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
        Schema::table('ticket_models', function (Blueprint $table) {
            // $table->unsignedBigInteger('servicesID')->nullable();
            // $table->foreign('servicesID')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services_id_ticket_models', function (Blueprint $table) {
            //
        });
    }
};
