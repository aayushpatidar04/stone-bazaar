<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('seller_enquiries', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->string('project_type')->nullable();
            $table->string('stone_requirement')->nullable();
            $table->string('quantity')->nullable();
            $table->string('budget_range')->nullable();
            $table->string('color_design')->nullable();
            $table->text('delivery_location')->nullable();
            $table->string('urgency')->nullable();
            $table->string('reference_image')->nullable(); // path to uploaded file
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seller_enquiries', function (Blueprint $table) {
            $table->dropColumn([
                'city',
                'project_type',
                'stone_requirement',
                'quantity',
                'budget_range',
                'color_design',
                'delivery_location',
                'urgency',
                'reference_image'
            ]);
        });
    }
};
