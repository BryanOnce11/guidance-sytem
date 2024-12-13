<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'elementary',
        'high_school',
        'vocational',
        'college',
        'scholarship',
    ];

    protected $casts = [
        'elementary' => 'array',
        'high_school' => 'array',
        'vocational' => 'array',
        'college' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
