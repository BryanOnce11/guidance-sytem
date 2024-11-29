<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'm_i',
        'image'
    ];

    //belongs to important when using with()
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
