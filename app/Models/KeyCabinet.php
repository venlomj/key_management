<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyCabinet extends Model
{
    use HasFactory;

    protected $table = 'key_cabinets';

    protected $fillable = [
        'cabinet_name',
        'location',
        'capacity',
        'current_count',
        'status',
    ];

    protected function keys()
    {
        return $this->belongsToMany(Key::class, 'key_cabinet_storage', 'key_cabinet_id', 'key_id')
            ->withTimestamps();
    }
}
