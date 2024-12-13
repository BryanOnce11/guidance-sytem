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
        'image',
        'status',
        'fname',
        'lname',
        'm_i',
        'course_id',
        'year_lvl',
        'age',
        'birth_date',
        'birth_place',
        'gender',
        'citizenship',
        'civil_status',
        'contact_num',
        'height',
        'weight',
        'blood_type',
        'present_address',
        'permanent_address',
        'where_staying'
        // 'emergency_fullname',
        // 'emergency_contact_num',
        // 'emergency_relationship',
        // 'emergency_address'
    ];

    public function setFnameAttribute($value)
    {
        $this->attributes['fname'] = ucwords($value);
    }

    // Capitalize the first letter of each word in 'lname'
    public function setLnameAttribute($value)
    {
        $this->attributes['lname'] = ucwords($value);
    }

    // Capitalize the first letter of the middle initial 'm_i'
    public function setMIAttribute($value)
    {
        $this->attributes['m_i'] = strtoupper($value); // Typically, initials are uppercase
    }

    // You can add mutators for other fields as needed (e.g., 'birth_place', 'present_address', etc.)
    // Example for 'birth_place':
    public function setBirthPlaceAttribute($value)
    {
        $this->attributes['birth_place'] = ucwords($value);
    }

    public function setCitizenshipAttribute($value)
    {
        $this->attributes['citizenship'] = ucwords($value);
    }

    // Example for 'present_address':
    public function setPresentAddressAttribute($value)
    {
        $this->attributes['present_address'] = ucwords($value);
    }

    public function setPermanentAddressAttribute($value)
    {
        $this->attributes['permanent_address'] = ucwords($value);
    }

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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function educational_data()
    {
        return $this->hasOne(EducationalData::class);
    }

    public function activity_interest()
    {
        return $this->hasOne(ActivityInterest::class);
    }

    public function personal_history()
    {
        return $this->hasOne(PersonalHistory::class);
    }

    public function counselling_record()
    {
        return $this->hasOne(CounsellingRecord::class);
    }

    public function sholastic_record()
    {
        return $this->hasOne(ScholasticRecord::class);
    }

    public function problem_checklist()
    {
        return $this->hasOne(ProblemChecklist::class);
    }
}
