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
        Schema::create('vendor_products', function (Blueprint $table) {
            $table->id('productID');
            $table->unsignedBigInteger('vendorID')->nullable();
            $table->foreign('vendorID')->references('id')->on('users')->onDelete('cascade');
            $table->string('prodID');
            $table->string('ProductName')->nullable();
            $table->longText('description')->nullable();
            $table->longText('tags')->nullable();
            $table->unsignedBigInteger('categoryID')->nullable();
            $table->foreign('categoryID')->references('CategoryID')->on('vendor_categories')->onDelete('cascade');
            $table->bigInteger('price')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('main_file_name')->nullable();
            $table->string('main_file_path')->nullable();
            $table->bigInteger('mrp_price')->nullable();
            $table->bigInteger('Quantity_Available')->deafult(0);
            $table->bigInteger('minimum_order_quantity')->deafult(0);
            $table->bigInteger('SKU')->comment("Stock Keeping Unit")->nullable();
            $table->bigInteger('Vendor_SKU')->comment("Stock Keeping Unit")->nullable();
            $table->date('lead_time')->nullable();
            $table->string('manufacturer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_products');
    }
};
