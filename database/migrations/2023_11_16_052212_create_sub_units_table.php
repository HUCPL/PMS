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
        Schema::create('sub_units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name');
            $table->integer('appartments')->nullable();
            $table->integer('unitID')->nullable();
            $table->string('propID');
            $table->integer('rooms')->nullable();
            $table->integer('rooms_no')->nullable();
            $table->integer('sqr_meter')->nullable();
            $table->integer('sqr_feet')->nullable();
            $table->integer('area')->nullable();
            $table->integer('bath')->nullable();
            $table->longText('features')->nullable();
            $table->longText('special_features')->nullable();
            $table->integer('bhk')->nullable();
            $table->integer('isAc')->comment('0 for yes Ac,1 for not Ac')->default(1);
            $table->integer('isFurnished')->comment('0 for fully furnished,1 for Semi Furnished,2 for not Furnished')->default(2);
            $table->bigInteger('general_rent')->nullable();
            $table->bigInteger('security_deposite')->nullable();
            $table->bigInteger('late_fees')->nullable();
            $table->bigInteger('adult')->nullable();
            $table->bigInteger('child')->nullable();
            $table->date('lease_start_date')->nullable();
            $table->date('lease_end_date')->nullable();
            $table->date('pay_due_date')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->integer('isActive')->comment('0 for active and 1 for not active')->default(0);
            $table->integer('isDeleted')->comment('0 for not delete and 1 for delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_units');
    }
};
