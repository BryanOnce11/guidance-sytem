<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    use HasFactory;

    protected $fillable = [
        'father_info_id',
        'mother_info_id',
        'spouse_info_id',
    ];

    public function father()
    {
        $this->belongsTo(FatherInfo::class);
    }

    public function mother()
    {
        $this->belongsTo(MotherInfo::class);
    }

    public function spouse()
    {
        $this->belongsTo(SpouseInfo::class);
    }
}
