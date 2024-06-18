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
        Schema::create('pmscontacts', function (Blueprint $table) {
            $table->id();
            $table->text('heading');
            $table->text('sub_heading');
            $table->longText('content');
            $table->bigInteger('phone');
            $table->text('form_heading');
            $table->longText('form_description');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmscontacts');
    }
};
