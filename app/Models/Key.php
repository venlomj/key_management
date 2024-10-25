<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_code',
        'key_type',
        'image',
        'embedded_image',
    ];

    /**
     * De gebruikers die deze sleutel hebben geleend.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_keys')->withPivot('loaned_at', 'returned_at', 'deposit_amount', 'deposit_refunded');
    }

    /**
     * De klaslokalen waartoe deze sleutel behoort via classroom_keys.
     */
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_keys')
            ->withPivot('quantity', 'extra_info', 'hook_number', 'category');
    }

    public function keyCabinets()
    {
        return $this->belongsToMany(KeyCabinet::class, 'key_cabinet_storages', 'key_id', 'key_cabinet_id')
            ->withTimestamps();
    }

    protected $hidden = ['created_at', 'updated_at'];
}
