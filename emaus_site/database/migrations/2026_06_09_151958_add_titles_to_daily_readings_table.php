<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('daily_readings', function (Blueprint $table) {
            $table->string('first_reading_title')->nullable();
            $table->string('second_reading_title')->nullable();
            $table->string('psalm_title')->nullable();
            $table->string('evangelho_title')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('daily_readings', function (Blueprint $table) {
            $table->dropColumn(['first_reading_title', 'second_reading_title', 'psalm_title', 'evangelho_title']);
        });
    }
};
