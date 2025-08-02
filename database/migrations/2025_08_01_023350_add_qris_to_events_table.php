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
        Schema::table('events', function (Blueprint $table) {
            $table->boolean('is_paid')->default(false)->after('location');
            $table->decimal('price', 12, 2)->nullable()->after('is_paid');
            $table->string('qris_image')->nullable()->after('price');
            $table->string('certificate_template')->nullable()->after('qris_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['is_paid', 'price', 'qris_image', 'certificate_template']);
        });
    }
};
