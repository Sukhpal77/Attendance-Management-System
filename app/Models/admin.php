<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $table = "admin";

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
        'position',       
        'department_id', 
        'qualification',  
        'father_name',
        'mother_name',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function users()
    {
        return $this->hasMany(User::class, 'admin_id');
    }
    
}
