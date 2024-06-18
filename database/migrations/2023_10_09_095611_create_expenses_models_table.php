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
        Schema::create('expenses_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propertyID')->nullable();
            $table->foreign('propertyID')->references('id')->on('on_board_property')->onDelete('cascade');
            $table->unsignedBigInteger('ownerID')->nullable();
            $table->foreign('ownerID')->references('id')->on('users')->onDelete('cascade');
            $table->string('expenses_type')->nullable();
            $table->date('date')->nullable();
            $table->bigInteger('amount');
            $table->longText('Expense_Description')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses_models');
        $table->dropSoftDeletes();
    }
};
