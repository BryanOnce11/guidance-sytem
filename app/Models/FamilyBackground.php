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
        'guardian_info_id',
        'emergency_contact_info_id',
        'source_of_income',
        'parent_status',
        'birth_rank',
        'number_of_siblings',
        'number_of_children'
    ];

    public function family_back()
    {
        return $this->hasOne(Student::class);
    }

    public function father()
    {
        return $this->belongsTo(FatherInfo::class, 'father_info_id');
    }

    public function mother()
    {
        return $this->belongsTo(MotherInfo::class, 'mother_info_id');
    }

    public function spouse()
    {
        return $this->belongsTo(SpouseInfo::class, 'spouse_info_id');
    }

    public function guardian()
    {
        return $this->belongsTo(GuardianInfo::class, 'guardian_info_id');
    }

    public function emergency_contact()
    {
        return $this->belongsTo(EmergencyContactInfo::class, 'emergency_contact_info_id');
    }
}
