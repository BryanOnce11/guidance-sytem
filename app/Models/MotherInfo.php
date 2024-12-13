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
        'm_i',
        'birth_date',
        'educational_attainment',
        'contact_num',
        'email',
        'occupation',
        'company_name',
        'company_address',
        'avg_monthly_income'
    ];

    public function family_back_mother()
    {
        return $this->hasOne(FamilyBackground::class);
    }
}
