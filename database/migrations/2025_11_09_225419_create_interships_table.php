<?php

use App\Enums\StatePostulationEnum;
use App\Enums\StatusInternshipEnum;
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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId("career_id")->constrained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->date('postulation_limit_date');
            $table->time("entry_time");
            $table->time("exit_time");
            $table->integer("vacant");
            $table->foreignId('location_id')
                ->constrained();
            $table->boolean('suspend')->default(false);
            $table->timestamps();
        });

        Schema::create('type_document_postulations', function(Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
        });

        Schema::create('postulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('internship_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('status', StatePostulationEnum::cases())
                ->default(StatePostulationEnum::CREATED);
            $table->timestamps();
            $table->unique(['student_id', 'internship_id'], 'student_internship_unique');
        });

        Schema::create('document_postulations', function(Blueprint $table) {
            $table->id();
            $table->foreignId('postulation_id')->constrained();
            $table->foreignId('type_document_postulation_id')->constrained();
            $table->unique(['postulation_id', 'type_document_postulation_id'], 'postulation_id_type_doc_unique');
            $table->boolean('verify')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_postulations');
        Schema::dropIfExists('postulations');
        Schema::dropIfExists('type_document_postulations');
        Schema::dropIfExists('internships');
    }
};
