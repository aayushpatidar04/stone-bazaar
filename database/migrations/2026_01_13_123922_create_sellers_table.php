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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->unique(); 
            $table->string('business_name'); 
            $table->string('gst_number')->unique(); 
            $table->string('gst_certificate')->nullable(); // file path 
            $table->string('address'); 
            $table->string('city'); 
            $table->string('state'); 
            $table->string('pincode');
            $table->string('geo_location')->nullable();
            $table->enum('gst_verification', ['pending','approved','rejected'])->default('pending');
            $table->enum('location_verification', ['pending','approved','rejected'])->default('pending');
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
