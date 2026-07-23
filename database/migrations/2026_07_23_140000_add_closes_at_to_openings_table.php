<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('openings', function (Blueprint $table) {
            $table->timestamp('closes_at')->nullable()->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('openings', function (Blueprint $table) {
            $table->dropColumn('closes_at');
        });
    }
};
