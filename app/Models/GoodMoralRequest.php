<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodMoralRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'stundent_id',
        'reason',
        'date_requested',
        'date_to_pickup',
        'status',
    ];


    public function stundent()
    {
        return $this->belongsTo(Student::class);
    }
}
