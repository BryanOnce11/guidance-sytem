<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'cigarette',
        'liquior',
        'drugs',
        'discipline',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
