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
        Schema::create('rent_property_units', function (Blueprint $table) {
            $table->id();
            $table->string('propertyID');
            $table->string('unit_name');
            $table->bigInteger('bed_rooms')->default(0);
            $table->bigInteger('bath')->default(0);
            $table->bigInteger('kitchen')->default(0);
            $table->bigInteger('general_rent')->nullable();
            $table->bigInteger('security_deposite')->nullable();
            $table->bigInteger('late_fee')->nullable();
            $table->integer('adult')->default(0);
            $table->integer('child')->default(0);
            $table->integer('rent_type')->comment('0 for monthly,1 for yearly,2 for custom,3 for daily');
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
        Schema::dropIfExists('rent_property_units');
        $table->dropSoftDeletes();
    }
};
