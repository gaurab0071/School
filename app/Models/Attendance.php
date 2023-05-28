<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'student_id', 'status', 'grade_id'];
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(student::class, 'student_id', 'id');
    }

}
