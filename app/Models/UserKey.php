<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserKey extends Model
{
    protected $fillable = [
        'user_id',
        'key_id',
        'remark',
        'quantity',
        'loaned_at',
        'returned_at',
    ];

    /**
     * De gebruiker die deze sleutel heeft geleend.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * De sleutel die door de gebruiker is geleend.
     */
    public function key(): BelongsTo
    {
        return $this->belongsTo(Key::class);
    }
}
