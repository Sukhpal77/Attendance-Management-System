<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

 

    protected $fillable = [
        'name',
        'description'
    ];

    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'department_id');
    }
    public function courses()
    {
        return $this->hasMany(Course::class, 'department_id');
    }
}
