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
        Schema::create('answers', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade'); // BIGINT NOT NULL
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade'); // BIGINT NOT NULL
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade'); // BIGINT NOT NULL
            $table->char('selected_answer', 1)->nullable();
            $table->boolean('is_correct')->nullable();
            $table->float('score')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
