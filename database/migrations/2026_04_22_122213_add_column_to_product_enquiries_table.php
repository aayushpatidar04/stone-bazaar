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
        Schema::table('product_enquiries', function (Blueprint $table) {
            $table->enum('status', ['pending', 'forwarded', 'closed', 'failed'])
                  ->default('pending')
                  ->change();
            $table->foreignId('forwarded_to')->nullable()->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_enquiries', function (Blueprint $table) {
            //
        });
    }
};
