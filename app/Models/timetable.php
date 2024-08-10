<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timetable extends Model
{
    use HasFactory;

    
    protected $table = 'timetable';

    // If your table has primary key other than 'id', define it here
    // protected $primaryKey = 'course_id';

    // If you don't have timestamp fields in your table, set this to false

    // Define which attributes are mass assignable
    protected $fillable = [
        'day',
        'subject_id',
        'course_id',
        'batch_id',
        'group',
        'teacher_id',
        'start_time',
        'end_time',
        'semester',
    ];

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

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}

