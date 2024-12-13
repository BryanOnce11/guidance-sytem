<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemChecklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'check_list',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    protected $casts = [
        'check_list' => 'array',
    ];
}
