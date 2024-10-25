<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = [
        'abbreviation',
        'name',
    ];

    /**
     * De klaslokalen die aan deze instelling zijn gekoppeld.
     */
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
