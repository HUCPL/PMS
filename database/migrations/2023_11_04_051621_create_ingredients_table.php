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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('code_no');
            $table->unsignedBigInteger('prodID')->nullable();
            $table->foreign('prodID')->references('productID')->on('vendor_products')->onDelete('cascade');
            $table->string('ingredient_name');
            $table->string('ingredient_type');
            $table->string('ingredient_value');
            $table->string('propertyID')->nullable();
            $table->integer('status')->comment('0 for active,1 no not active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
