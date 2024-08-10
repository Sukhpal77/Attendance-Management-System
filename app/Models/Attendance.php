<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'present',
        'sid',
        'tid',
        'subject_id',
        'course_id',
        'batch_id',
        'group',
        'timetable_id',
    ];

     public function student()
    {
        return $this->belongsTo(Student::class, 'sid');
    }
    public function timetable()
    {
        return $this->belongsTo(timetable::class, 'timetable_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'tid');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

}
