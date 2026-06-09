<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('daily_readings', function (Blueprint $table) {
            $table->text('psalm_text')->nullable();
            $table->string('psalm_ref')->nullable();
            $table->text('gospel_text')->nullable();
            $table->string('gospel_ref')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('daily_readings', function (Blueprint $table) {
            $table->dropColumn(['psalm_text', 'psalm_ref', 'gospel_text', 'gospel_ref']);
        });
    }
};
