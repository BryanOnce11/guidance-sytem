<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualCounseling extends Model
{
    use HasFactory;

    protected $fillable = [
        'stundent_id',
        'date_requested',
        'date_scheduled',
        'status',
    ];


    public function stundent()
    {
        return $this->belongsTo(Student::class);
    }
}
