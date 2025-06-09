<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Question extends Model
{
    use HasFactory;

    protected $fillable = ['option_a', 'option_b', 'option_c', 'option_d', 'option_e', 'correct_answer'];
    protected $table = 'questions';
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
