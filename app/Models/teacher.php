<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;

    public $incrementing = false; // Disable auto-incrementing IDs
    protected $keyType = 'string'; // Use string as the primary key type
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'number',
        'street_address',
        'city',
        'state',
        'pincode',
        'department_id',
        'qualification',
        'father_name',
        'mother_name',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher', 'teacher_id', 'course_id');
    }

    // Define many-to-many relationship with subjects
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_teacher', 'teacher_id', 'subject_id');
    }
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 't_id');
    }


}
