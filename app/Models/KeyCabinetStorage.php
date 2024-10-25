<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyCabinetStorage extends Model
{
    use HasFactory;

    protected $table = 'key_cabinet_storage';

    protected $fillable = [
        'key_id',
        'key_cabinet_id',
        'description',
        'hook_number'
    ];

    public function key()
    {
        return $this->belongsTo(Key::class);
    }

    public function keyCabinet()
    {
        return $this->belongsTo(KeyCabinet::class);
    }
}
