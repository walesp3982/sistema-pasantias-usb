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

        Schema::create("management", function (Blueprint $table) {
            $table->id();
            $table->year("year");
            $table->integer("number");
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
            $table->integer("identity_card")->unique();
            // $table->foreignId("phone_id")->constrained();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->timestamps();

            $table->foreignId("management_id")->constrained()->onDelete('cascade');
            $table->foreignId("career_id")->constrained()->onDelete('cascade');
            $table->foreignId("shifts_id")->constrained()->onDelete('cascade');

            $table->unique(['first_name', 'last_name']);
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
