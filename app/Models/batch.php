<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batch extends Model
{
    use HasFactory;


    protected $fillable = [
        'batch_name',
        'course_id', 
    ];

    public function timetables()
    {
        return $this->hasMany(timetable::class, 'batch_id');
    }   
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'batch_id');
    } 

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    

}
