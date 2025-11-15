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
        Schema::create("careers", function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
        });

        Schema::create("shifts", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->time("entry_time");
            $table->time("exit_time");
        });


        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->integer('ru')->unique();
            $table->integer('semester');
            $table->foreignId("career_id")->constrained()->onDelete('cascade');
            $table->foreignId("shift_id")->constrained()->onDelete('cascade');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
        Schema::dropIfExists('shifts');
        Schema::dropIfExists('management');
        Schema::dropIfExists('careers');
    }
};
