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
            $table->foreignId("sector_id")
                ->constrained()
                ->onDelete('cascade');
            $table->string("email")->unique();
            $table->timestamps();
        });

        Schema::create('company_location', function(Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->boolean('active')->default(true);
            $table->string("name_administrador");
            $table->foreignId('phone_id')->nullable()->constrained();
            $table->index(["location_id", "company_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("company_location");
        Schema::dropIfExists('companies');
        Schema::dropIfExists('sectors');
    }
};
