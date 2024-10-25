<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'key_id',
        'quantity',       // Aantal sleutels
        'extra_info',     // Extra informatie over de sleutel
        'hook_number',     // Haaknummer
        'category',       // Categorie van de sleutel
    ];

    /**
     * De klaslokaal die deze sleutel heeft.
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    /**
     * De sleutel die aan dit klaslokaal is gekoppeld.
     */
    public function key()
    {
        return $this->belongsTo(Key::class);
    }
}
