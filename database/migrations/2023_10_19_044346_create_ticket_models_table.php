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
        Schema::create('ticket_models', function (Blueprint $table) {
            $table->id();
            $table->string('TicketID');
            $table->unsignedBigInteger('propertyID')->nullable();
            $table->foreign('propertyID')->references('id')->on('on_board_property')->onDelete('cascade');
            $table->unsignedBigInteger('customberID')->nullable();
            $table->foreign('customberID')->references('id')->on('users')->onDelete('cascade');
            // $table->integer('categoryID')->nullable();
            $table->unsignedBigInteger('departmentID')->nullable();
            $table->foreign('departmentID')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('servicesID')->nullable();
            $table->foreign('servicesID')->references('id')->on('services')->onDelete('cascade');
            $table->integer('status')->comment('0 for open,1 for in progress,2 for closed,3 for reopend')->default(0);
            $table->integer('Priority')->comment('0 for low,1 for normal,3 high')->default(0);
            $table->string('submit_by')->comment('the name of the person who raised the ticket')->nullable();
            $table->unsignedBigInteger('AssignTo')->nullable();
            $table->foreign('AssignTo')->references('id')->on('users')->onDelete('cascade');
            $table->longText('description')->comment('description about issue')->nullable();
            $table->longText('Notes_Comments')->comment('additional Notes and bug')->nullable();
            $table->string('attachement_name')->nullable();
            $table->string('attachement_path')->nullable();
            $table->longText('resolution')->comment('description about how the was resolved')->nullable();
            $table->date('reOpened_date')->comment('date of when ticket reopend')->nullable();
            $table->longText('reOpened_reason')->comment('why ticket reopen')->nullable();
            $table->integer('feedback_rating')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_models');
        $table->dropSoftDeletes();
    }
};
