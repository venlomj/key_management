<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_code',
        'classroom_block',
        'institution_id',
        'classroom_description',
        'short_description',
        'note',
    ];

    /**
     * De sleutels die aan dit klaslokaal zijn gekoppeld via classroom_keys.
     */
    public function keys()
    {
        return $this->belongsToMany(Key::class, 'classroom_keys')
            ->withPivot('quantity', 'extra_info', 'hook_number', 'category');
    }

    /**
     * De instelling waartoe dit klaslokaal behoort.
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
