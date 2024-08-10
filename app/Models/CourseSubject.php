<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    use HasFactory;

    protected $table = 'course_subject';

    // Define the primary key if it's a composite key
    protected $primaryKey = ['course_id', 'subject_id'];

    // Since it's a pivot table, you typically won't use timestamps
    public $timestamps = false;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'course_subject', 'course_id', 'subject_id');
    }
}
