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
        Schema::create('municipalities', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("total_district");
        });

        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("district_number");
            $table->foreignId('municipality_id')->constrained()->onDelete('cascade');
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("zone_id")->constrained()->onDelete('cascade');
            $table->string("street");
            $table->morphs('locatable');
            $table->string('reference')->nullable();
            $table->integer("number_door");
            $table->string("phone_number",18)->unique();
            $table->boolean("principal")->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
        Schema::dropIfExists('zones');
        Schema::dropIfExists('municipalities');
        Schema::dropIfExists('phones');
    }
};
