<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;


    protected $fillable = [
        'subject_name',
    ];

    public function courses()
    {
        return $this->belongsToMany(course::class, 'course_subject', 'subject_id', 'course_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(teacher::class, 'subject_teacher', 'subject_id', 'teacher_id');
    }
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }

}
