<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingNotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'virtual_counseling_id',
        'notes',
        'duration'
    ];
}
