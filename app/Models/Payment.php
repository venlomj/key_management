<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_key_id',
        'amount',
        'payment_method',
    ];

    /**
     * De gebruiker die deze betaling heeft gedaan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * De geleende sleutel die aan deze betaling is gekoppeld.
     */
    public function userKey()
    {
        return $this->belongsTo(UserKey::class);
    }
}
