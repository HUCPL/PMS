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
        Schema::create('packages', function (Blueprint $table) {
            $table->id('package_id');
            $table->string('packages_name');
            $table->string('unique_id');
            $table->longText('services')->nullable();
            $table->integer('provider')->comment('0 for inhouse, 1 for vendor')->nullable();
            $table->longText('subServices')->nullable();
            $table->integer('package_type')->comment('0 for monthly,1 for quaterly,2 for half yearly,3 for yearly')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->integer('isDeleted')->comment('0 for not delete,1 for delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
