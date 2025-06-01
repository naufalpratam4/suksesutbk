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
       Schema::create('exam_questions', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade'); // BIGINT NOT NULL
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade'); // BIGINT NOT NULL
            // No timestamps in the original SQL for this pivot table.
            // $table->timestamps(); // Add if you want them
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_questions');
    }
};
