<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Lorry extends Model
{
    protected $fillable = [
        'brand',
        'engine',
        'color',
        'transmission',
        'production_year',
        'wheel',
        'dump_truck',
        'carrying',
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
            'lorries_test_labs',
            'lorry_id',
            'test_lab_id'
        );
    }

    public function setTestLabs($ids)
    {
        $this->testLabs()->sync($ids);
    }
}
