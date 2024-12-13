<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuardianInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'contact_num',
        'occupation',
        'company_name',
        'relationship',
        'address',
    ];

    public function family_back_guardian()
    {
        return $this->hasOne(related: FamilyBackground::class);
    }
}
