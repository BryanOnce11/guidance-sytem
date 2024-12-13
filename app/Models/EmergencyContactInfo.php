<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContactInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'contact_num',
        'relationship',
        'address',
    ];

    public function family_back_emergency_contact()
    {
        return $this->hasOne(related: FamilyBackground::class);
    }
}
