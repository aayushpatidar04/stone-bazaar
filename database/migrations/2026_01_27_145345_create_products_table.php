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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_subcategory_id')->constrained()->onDelete('cascade'); 
            $table->string('name'); // e.g. Makrana White 
            $table->text('description')->nullable(); 
            $table->json('images'); // Array of product images 
            $table->json('finishes')->nullable(); // ["Polished", "Honed", "Flamed"] 
            $table->json('sizes')->nullable();
            $table->string('thickness')->nullable();
            $table->string('color')->nullable();
            $table->text('quality')->nullable();
            $table->json('usage_area')->nullable();
            $table->unique(['seller_subcategory_id', 'name']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
