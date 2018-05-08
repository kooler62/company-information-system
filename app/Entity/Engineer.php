<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'phone_number',
        'personal_number',
        'home_address',
        'employment_date',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
