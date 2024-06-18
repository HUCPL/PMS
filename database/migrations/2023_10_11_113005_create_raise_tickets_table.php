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
        Schema::create('raise_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticketID')->nullable();
            $table->unsignedBigInteger('proppertyID')->nullable();
            $table->foreign('proppertyID')->references('id')->on('on_board_property')->onDelete('cascade');
            $table->unsignedBigInteger('cusID')->nullable();
            $table->foreign('cusID')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('servicesID')->nullable();
            $table->foreign('servicesID')->references('id')->on('services')->onDelete('cascade');
            $table->longText('Message')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->SoftDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raise_tickets');
        $table->dropSoftDeletes();
    }
};
