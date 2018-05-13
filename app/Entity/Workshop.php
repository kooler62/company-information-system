<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = ['workshop_name'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function engineers()
    {
        return $this->hasMany(Engineer::class);
    }

    public function testLabs()
    {
        return $this->belongsToMany(
            TestLab::class,
            'workshop_test_labs',
            'workshop_id',
            'test_lab_id'
        );
    }
}
