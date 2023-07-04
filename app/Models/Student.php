<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function student()
    {
        return $this->belongsTo(student::class, 'grade_id', 'id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'idnumber', 'idnumber');
    }
}
