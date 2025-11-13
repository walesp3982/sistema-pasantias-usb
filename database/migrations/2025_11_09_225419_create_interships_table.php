<?php

use App\Enums\StatePostulationEnum;
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
        Schema::create('interships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId("career_id")->constrained()->onDelete('cascade');
            $table->date('start_date');
            $table->date('postulation_limit_date');
            $table->date('end_date');
            $table->time("entry_time");
            $table->time("exit_time");
            $table->integer("vacant");
            $table->string("description")->nullable();
            $table->foreignId('location_id')
                ->constrained();
            $table->enum('status', ["pending", "progress", "finished", "suspend"]);
        });

        $status_postulation = StatePostulationEnum::cases();

        Schema::create('type_document_postulations', function(Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
        });

        Schema::create('postulations', function (Blueprint $table)
        use ($status_postulation) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('intership_id')->constrained()->onDelete('cascade');
            $table->enum('status', $status_postulation)
                ->default(StatePostulationEnum::CREATED);
            $table->timestamps();
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
        Schema::dropIfExists('interships');
    }
};
