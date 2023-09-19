<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_id',
        'student_id',
        'subject_id',
        'full_marks',
        'pass_marks',
        'obtained_theory',
        'obtained_practical',
        // Add any other relevant fillable fields.
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
