<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KeyCabinet extends Model
{
    protected $table = 'key_cabinets';

    protected $fillable = [
        'cabinet_name',
        'location',
        'capacity',
        'current_count',
        'status',
    ];

    protected function keys(): BelongsToMany
    {
        return $this->belongsToMany(Key::class, 'key_cabinet_storage', 'key_cabinet_id', 'key_id')
            ->withTimestamps();
    }
}
