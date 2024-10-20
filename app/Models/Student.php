<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'family_background_id',
        'student_id',
        'fname',
        'lname',
        'm_i',
        'course',
        'year_lvl',
        'birth_date',
        'birth_place',
        'gender',
        'citizenship',
        'civil_status',
        'contact_num',
        'emergency_fullname',
        'emergency_contact_num',
        'emergency_occupation',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function family_back()
    {
        return $this->belongsTo(FamilyBackground::class, 'family_background_id');
    }

    public function good_moral()
    {
        return $this->hasOne(GoodMoralRequest::class);
    }

    public function virtual_counseling()
    {
        return $this->hasOne(VirtualCounseling::class);
    }
}
