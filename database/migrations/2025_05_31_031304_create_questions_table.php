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
       Schema::create('questions', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('exam_id')->constrained('exams')->onDelete('cascade'); // BIGINT NOT NULL
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade'); // BIGINT NOT NULL
            $table->enum('type', ['pg', 'essay']); // 'pg' for multiple choice (pilihan ganda)
            $table->text('question_text');
            $table->text('option_a')->nullable();
            $table->text('option_b')->nullable();
            $table->text('option_c')->nullable();
            $table->text('option_d')->nullable();
            $table->text('option_e')->nullable();
            $table->char('correct_answer', 1)->nullable(); // Assuming 'A', 'B', 'C', 'D', 'E'
            $table->float('score')->default(1);
            $table->string('gambar')->nullable();
            $table->timestamp('created_at')->useCurrent();
            // The original SQL doesn't have updated_at for questions,
            // but Laravel's default $table->timestamps() includes it.
            // If you want to strictly follow SQL:
            // $table->timestamp('updated_at')->nullable()->default(null)->onUpdate(null);
            // Or simply let Laravel handle it if an updated_at is acceptable:
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
