<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed brand
 * @property mixed body_type
 * @property mixed engine
 * @property mixed transmission
 * @property mixed production_year
 * @property mixed make_now
 * @property mixed workshop_id
 */
class Car extends Model
{
    protected $fillable = [
        'brand',
        'body_type',
        'engine',
        'color',
        'transmission',
        'production_year',
        'make_now',
        'workshop_id',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }
}