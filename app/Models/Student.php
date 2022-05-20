<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function mark()
    {
        return $this->hasMany(Student::class,'student_id');
    }

    
}
