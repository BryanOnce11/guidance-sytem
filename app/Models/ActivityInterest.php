<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityInterest extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'student_id',            // Foreign key for User (Note: Laravel will assume it's 'user_id')
        'extra_curricular',    // JSON field for extra-curricular activities
        'special_skills',      // Special skills (string)
        'hobbies',             // Hobbies (string)
        'interest',            // JSON field for interests
        'subject_best_like',   // Subject they like best
        'subject_least_like',  // Subject they like least
    ];

    // Optionally, cast JSON fields to arrays
    protected $casts = [
        'extra_curricular' => 'array',  // Cast JSON to array
        'interest' => 'array',          // Cast JSON to array
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
