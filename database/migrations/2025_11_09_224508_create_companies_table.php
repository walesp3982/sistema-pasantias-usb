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
        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("email")->unique();
            $table->string("name_manager");
            $table->foreignId("sector_id")
                ->constrained()
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("company_locations");
        Schema::dropIfExists('companies');
        Schema::dropIfExists('sectors');
    }
};
