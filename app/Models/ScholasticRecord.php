<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholasticRecord extends Model
{
    use HasFactory;

    // Specify the fields that can be mass-assigned
    protected $fillable = [
        'student_id',
        'scholastic_record_1',
        'scholastic_record_2',
        'scholastic_record_3',
        'scholastic_record_4',
        'scholastic_record_5',
        'scholastic_record_6',
        'scholastic_record_7',
        'scholastic_record_8',
        'scholastic_record_9',
        'scholastic_record_10',
    ];

    // Cast the JSON fields to an array
    protected $casts = [
        'scholastic_record_1' => 'array',
        'scholastic_record_2' => 'array',
        'scholastic_record_3' => 'array',
        'scholastic_record_4' => 'array',
        'scholastic_record_5' => 'array',
        'scholastic_record_6' => 'array',
        'scholastic_record_7' => 'array',
        'scholastic_record_8' => 'array',
        'scholastic_record_9' => 'array',
        'scholastic_record_10' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
