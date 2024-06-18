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
        Schema::create('sub_service_packages', function (Blueprint $table) {
            $table->id('subsp_id');
            $table->unsignedBigInteger('id')->comment('service id');
            $table->foreign('id')->references('id')->on('services')->onDelete('cascade');
            $table->string('unique_id')->comment('package unique id');
            $table->integer('isDelete')->comment('0 for not delete,1 for delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_service_packages');
    }
};
