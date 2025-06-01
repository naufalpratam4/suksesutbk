<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subject; 
use App\Models\User; 

class exams extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];
    protected $table = 'exams';

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function kategori(){
        return $this->belongsTo(subject::class, 'subject_id');
    }
    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }

}
