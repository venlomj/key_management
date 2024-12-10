<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Key extends Model
{
    protected $fillable = [
        'code',
        'type',
        'image',
        'embedded_image',
    ];



    public function scopeSearchKeyCode($query, $filter)
    {
        return $query->where('code', 'like', '%'.$filter.'%');
    }

    // Accessors and mutators
    protected function code(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
            set: fn($value) => strtoupper($value),
        );
    }

    /**
     * De gebruikers die deze sleutel hebben geleend.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_keys')
            ->withPivot('remark', 'quantity', 'loaned_at', 'returned_at');
    }

    public function classrooms(): HasMany
    {
        return $this->hasMany(Classroom::class, 'key_id', 'id');
    }

    public function keyCabinets(): BelongsToMany
    {
        return $this->belongsToMany(KeyCabinet::class, 'key_cabinet_storages', 'key_id', 'key_cabinet_id')
            ->withTimestamps();
    }

    protected $hidden = ['created_at', 'updated_at'];
}
