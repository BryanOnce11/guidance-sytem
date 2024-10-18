<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotherInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'occupation'
    ];

    public function family_back()
    {
        return $this->hasOne(FamilyBackground::class);
    }
}
