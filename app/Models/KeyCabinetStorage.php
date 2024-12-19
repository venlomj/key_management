<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KeyCabinetStorage extends Model
{
    protected $table = 'key_cabinet_storages';

    protected $fillable = [
        'key_id',
        'key_cabinet_id',
        'description',
        'hook_number'
    ];

    public function key(): BelongsTo
    {
        return $this->belongsTo(Key::class);
    }

    public function keyCabinet(): BelongsTo
    {
        return $this->belongsTo(KeyCabinet::class);
    }
}
