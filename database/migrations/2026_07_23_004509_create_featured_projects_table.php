<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('featured_projects', function (Blueprint $table) {
            $table->id();
            $table->string('photo_label')->nullable();
            $table->string('photo_src');
            $table->string('title');
            $table->text('description');
            $table->string('href');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('featured_projects');
    }
};
