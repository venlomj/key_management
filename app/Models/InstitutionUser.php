<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InstitutionUser extends Model
{
    protected $fillable = [
    'institution_id',
    'user_id',
];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }
}
