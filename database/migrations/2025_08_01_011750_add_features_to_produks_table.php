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
        Schema::table('produks', function (Blueprint $table) {
            $table->boolean('quality_guaranteed')->default(false)->after('price');
            $table->boolean('periodic_support')->default(false)->after('quality_guaranteed');
            $table->boolean('support_24_7')->default(false)->after('periodic_support');
            $table->text('features')->nullable()->after('support_24_7');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn(['quality_guaranteed', 'periodic_support', 'support_24_7', 'features']);
        });
    }
};
