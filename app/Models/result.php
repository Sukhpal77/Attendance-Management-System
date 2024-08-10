<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'course_id',
        'semester',
        'credits',
        'grade',
    ];

   
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

   
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

   
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
