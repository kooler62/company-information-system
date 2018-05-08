<?php

namespace App\Entity;

use App\Engineers;
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
        return $this->hasMany(Engineers::class);
    }

    public function testLabs()
    {
        return $this->belongsToMany(
            TestLabs::class,
            'workshop_test_labs',
            'test_lab_id',
            'workshop_id'
        );
    }
}
