<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GoodMoralRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'reason',
        'date_requested',
        'date_to_pickup',
        'status',
    ];

    protected $casts = [
        'date_requested' => 'datetime',
        'date_to_pickup' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // public function getFormattedDateToPickupAttribute()
    // {
    //     return $this->date_to_pickup
    //         ? Carbon::parse($this->date_to_pickup)
    //             ->setTimezone('Asia/Manila')
    //             ->format('M d, Y h:i A')
    //         : null;
    // }
}
