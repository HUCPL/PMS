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
        Schema::create('on_board_property', function (Blueprint $table) {
            $table->id();
            $table->string('propertyName');
            $table->unsignedBigInteger('propertyCategory');
            $table->foreign('propertyCategory')->references('category_id')->on('category_models')->onDelete('cascade');
            // $table->unsignedBigInteger('owner_id');
            // $table->foreign('owner_id')->references('owner_id')->on('owner_details')->onDelete('cascade');
            $table->string('aggrement_id')->nullable();
            $table->integer('property_for')->comment('0 for rent , 1 for pms , 2 for both');
            $table->bigInteger('sqr_meter')->nullable();
            $table->bigInteger('sqr_feet')->nullable();
            $table->bigInteger('buildup')->nullable();
            $table->bigInteger('coverup')->nullable();
            $table->date('construction_year')->nullable();
            $table->date('renovation_year')->nullable();
            $table->bigInteger('rooms')->nullable();
            $table->bigInteger('floor')->nullable();
            $table->longtext('property_utility');
            $table->longText('outdoor_features');
            $table->longText('indoor_feature')->nullable();
            $table->date('aggrement_start_date')->nullable();
            $table->date('aggrement_end_date')->nullable();
            $table->integer('isApproved')->comment('0 for approved 1 for not approved')->deafult(1);
            $table->string('propUniqueID');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('on_board_properties');
        $table->dropSoftDeletes();
    }
};
