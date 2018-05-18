<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Brigade extends Model
{
    protected $fillable = [
        'brigade_name'
    ];

    public function workers()
    {
        return $this->hasMany(Worker::class);
    }
}
