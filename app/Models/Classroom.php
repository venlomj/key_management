<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    protected $fillable = [
        'classroom_name',
        'classroom_code',
        'classroom_block',
        'institution_id',
        'classroom_description',
        'short_description',
        'note',
        'key_id',
        'first_specification',
        'second_specification',
    ];

    public function scopeSearchClassroomNameOrCodeOrBlock($query, $search)
    {
        return $query->where('classroom_name', 'like', '%'.$search.'%')
            ->orWhere('classroom_code', 'like', '%'.$search.'%')
            ->orWhere('classroom_block', 'like', '%'.$search.'%');
    }

    // Get the key_code
    protected $appends = ['key_code'];

    protected function keyCode(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => isset($attributes['key_id'])
                ? Key::find($attributes['key_id'])->code
                : null,
        );
    }

    public function key(): BelongsTo
    {
        return $this->belongsTo(Key::class);
    }

    /**
     * De instelling waartoe dit klaslokaal behoort.
     */
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }
}
