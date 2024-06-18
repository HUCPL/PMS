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
        Schema::table('raise_tickets', function (Blueprint $table) {
           $table->integer('setPriority')->default(0)->comment('0 for low,1 for Normal,3 for high');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('raise_tickets', function (Blueprint $table) {
            //
        });
    }
};
