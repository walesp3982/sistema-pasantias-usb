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
        Schema::create('pictures', function (Blueprint $table) {
            $table->string('path_thumbnail')->nullable();
            $table->string('path_medium')->nullable();
            $table->string('extension');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer("height");
            $table->integer("width");
            $table->integer("size");
            $table->morphs('pictureable');
        });

         Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name');
            $table->string('extension');
            $table->string('path');
            $table->integer('size');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->morphs('documentable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
        Schema::dropIfExists('documents');
    }
};
