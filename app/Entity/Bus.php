<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'brand',
        'engine',
        'color',
        'transmission',
        'production_year',
        'man_capacity',
        'make_now',
        'workshop_id',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function testLabs()
    {
        return $this->belongsToMany(
            TestLab::class,
            'buses_test_labs',
            'bus_id',
            'test_lab_id'
        );
    }

    public function setTestLabs($ids)
    {
        $this->testLabs()->sync($ids);
    }
}
