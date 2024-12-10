<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institution extends Model
{
    protected $fillable = [
    'abbreviation',
    'name',
        ];

    /**
     * De klaslokalen die aan deze instelling zijn gekoppeld.
     */
    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'institution_users');
    }
}
