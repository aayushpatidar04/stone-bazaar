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
        Schema::table('architect_enquiries', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->string('project_type')->nullable();
            $table->string('property_type')->nullable();
            $table->string('project_area')->nullable();
            $table->string('project_status')->nullable();
            $table->string('budget_range')->nullable();
            $table->string('services_required')->nullable();
            $table->json('scope_of_work')->nullable(); // multiple checkboxes
            $table->string('design_preference')->nullable();
            $table->text('requirements')->nullable();
            $table->string('preferred_time')->nullable();
            $table->string('referral_source')->nullable();
            $table->string('reference_file')->nullable(); // path to uploaded file
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('architect_enquiries', function (Blueprint $table) {
            $table->dropColumn([
                'city',
                'project_type',
                'property_type',
                'project_area',
                'project_status',
                'budget_range',
                'services_required',
                'scope_of_work',
                'design_preference',
                'requirements',
                'preferred_time',
                'referral_source',
                'reference_file',
                'status'
            ]);
        });
    }
};
