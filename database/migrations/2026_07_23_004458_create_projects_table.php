<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('client');
            $table->string('country');
            $table->string('year');
            $table->string('tag');
            $table->string('color')->default('red');
            $table->string('title');
            $table->text('challenge');
            $table->json('scope');
            $table->string('scale')->nullable();
            $table->text('results');
            $table->string('photo_label')->nullable();
            $table->string('photo_src')->nullable();
            $table->string('related_service_href')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
