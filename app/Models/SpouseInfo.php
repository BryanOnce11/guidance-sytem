<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpouseInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'm_i',
        'occupation'
    ];

    public function family_back_spouse()
    {
        return $this->hasOne(FamilyBackground::class);
    }
}
