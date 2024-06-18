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
        Schema::create('assign_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticketID')->nullable();
            $table->foreign('ticketID')->references('id')->on('raise_tickets')->onDelete('cascade');
            $table->integer('superVisorID');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_tickets');
    }
};
