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
        Schema::create('back_images', function (Blueprint $table) {
            $table->id();
            $table->string('propUniqueID');
            $table->string('file_name');
            $table->string('file_path');
            $table->integer('isActive')->comment('0 for Active,1 for inActive')->default(0);
            $table->integer('isDeleted')->comment('0 for delet, 1 for not delete')->deafult(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('back_images');
    }
};
