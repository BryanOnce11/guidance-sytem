<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualCounseling extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'date_requested',
        'date_scheduled',
        'reason',
        'status',
    ];

    protected $casts = [
        'date_requested' => 'datetime',
        'date_scheduled' => 'datetime',
    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function counseling_notes()
    {
        return $this->hasOne(CounselingNotes::class);
    }
}
