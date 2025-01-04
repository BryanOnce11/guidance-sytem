<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'type',
        'date_requested',
        'date_rejected'
    ];

    protected $cast = [
        'date_requested' => 'datetime',
        'date_rejected' => 'datetime'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
