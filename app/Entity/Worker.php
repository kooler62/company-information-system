<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'phone_number',
        'personal_number',
        'home_address',
        'category',
        'is_brigadier',
        'employment_date',
        'brigade_id',
        'workshop_id'
    ];

    public function brigade()
    {
        return $this->belongsTo(Brigade::class);
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}
