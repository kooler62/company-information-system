<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    protected $fillable = [
        'brand',
        'engine',
        'color',
        'transmission',
        'production_year',
        'stroller',
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
            'motorcycles_test_labs',
            'motorcycle_id',
            'test_lab_id'
        );
    }

    public function setTestLabs($ids)
    {
        $this->testLabs()->sync($ids);
    }
}
