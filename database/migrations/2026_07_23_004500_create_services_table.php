<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('category_slug');
            $table->string('index_label');
            $table->string('eyebrow');
            $table->string('title');
            $table->text('description');
            $table->json('capabilities')->nullable();
            $table->string('photo_label')->nullable();
            $table->string('photo_src')->nullable();
            $table->string('image_side')->default('right');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
