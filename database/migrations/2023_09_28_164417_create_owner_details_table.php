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
        Schema::create('owner_details', function (Blueprint $table) {
            $table->id('owner_id');
            $table->string('ownerName');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->bigInteger('zipcode');
            $table->longText('address');
            $table->string('email');
            $table->bigInteger('phone');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_details');
        $table->dropSoftDeletes();
    }
};
