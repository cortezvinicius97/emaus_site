<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('daily_readings', function ($table) {
            $table->renameColumn('gospel_text', 'evangelho_text');
            $table->renameColumn('gospel_ref', 'evangelho_ref');
        });
    }

    public function down(): void
    {
        Schema::table('daily_readings', function ($table) {
            $table->renameColumn('evangelho_text', 'gospel_text');
            $table->renameColumn('evangelho_ref', 'gospel_ref');
        });
    }
};
