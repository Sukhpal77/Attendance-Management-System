<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
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
        'course_id',
        'batch_id',
        'group',
        'semester',
        'father_name',
        'mother_name',
    ];


    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function users()
    {
        return $this->hasMany(User::class, 's_id');
    }

}
