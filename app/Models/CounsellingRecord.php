<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounsellingRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'counselling_record_1',
        'counselling_record_2',
        'counselling_record_3',
    ];

    protected $casts = [
        'counselling_record_1' => 'array',
        'counselling_record_2' => 'array',
        'counselling_record_3' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
