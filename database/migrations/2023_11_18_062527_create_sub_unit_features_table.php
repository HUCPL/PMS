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
        Schema::create('sub_unit_features', function (Blueprint $table) {
            $table->id();
            $table->string('subUnitID')->nullable();
            $table->longText('features')->nullable();
            $table->integer('isDelete')->comment('0 for delete , 1 for not delete')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_unit_features');
    }
};
