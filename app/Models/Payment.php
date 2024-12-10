<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'deposit_amount',
        'deposit_paid',
        'deposit_refunded',
        'payment_method',
    ];

    protected $casts = [
        'payment_method' => PaymentMethod::class,
    ];
    /**
     * De gebruiker die deze betaling heeft gedaan.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
