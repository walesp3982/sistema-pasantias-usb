<?php

use App\Enums\InternStatusEnum;
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
        Schema::create('interns', function(Blueprint $table) {
            $table->id();
            $table->foreignId('postulation_id')->constrained()->onDelete('cascade');
            $table->enum('status',InternStatusEnum::cases());
        });

        Schema::create('type_reports', function(Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->enum('class', ['good', 'bad']);
        });

        Schema::create('reports', function(Blueprint $table) {
            $table->id();
            $table->string("descripcion");
            $table->foreignId("user_id")->constrained();
            $table->foreignId('type_report_id')->constrained()->onDelete('cascade');
            $table->date('date_create');
            $table->foreignId('intern_id')->constrained()->onDelete('cascade');
            $table->boolean('verify')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
        Schema::dropIfExists('type_reports');
        Schema::dropIfExists('interns');
    }
};
