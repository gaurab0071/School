<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;


    /**
     * Get the user associated with the Teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subject()
    {
        return $this->hasOne(subject::class);
    }

    public function grade()
    {
        return $this->hasOne(Teacher::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasRole($roleName)
    {
        // Retrieve the roles associated with the teacher
        $roles = $this->roles; // Assuming you have a relationship defined

        // Check if the teacher has the specified role
        return $roles->contains('name', $roleName);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    
}
