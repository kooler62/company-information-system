<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class TestLab extends Model
{
    protected $fillable = [
        'name'
    ];

    public function workshops()
    {
        return $this->belongsToMany(
            Workshop::class,
            'workshop_test_labs',
            'test_lab_id',
            'workshop_id'
        );
    }

    public function cars()
    {
        return $this->belongsToMany(
            Car::class,
            'cars_test_labs',
            'test_lab_id',
            'car_id'
        );
    }
}
