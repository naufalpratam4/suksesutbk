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
       Schema::create('exams', function (Blueprint $table) {
            $table->id(); // BIGINT AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade'); // BIGINT NOT NULL
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade'); // BIGINT NOT NULL
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->integer('duration'); // in minutes
            $table->boolean('is_random')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
