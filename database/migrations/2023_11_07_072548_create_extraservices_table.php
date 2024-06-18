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
        Schema::create('extraservices', function (Blueprint $table) {
            $table->id();
            $table->integer('propertyID');
            $table->longText('serviceID');
            $table->longText('subServicesID')->nullable();
            $table->integer('isDeleted')->comment('0 for delete,1 for not delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extraservices');
    }
};
