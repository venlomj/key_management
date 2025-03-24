<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'account_id',
        'last_name',
        'first_name',
        'active',
        'admin',
        'employee_code',
        'date_of_birth',
        //'preferred_name',
        'to_keep',
        'email',
        'password',
    ];

    public function getFullNameAttribute(): string
    {
        return ucfirst($this->first_name).' '.ucfirst($this->last_name);
    }

    public function scopeSearchFirstNameOrLastName($query, $search)
    {
        return $query->where('first_name', 'like', '%'.$search.'%')
            ->orWhere('last_name', 'like', '%'.$search.'%');
            //->orWhere('preferred_name', 'like', '%'.$search.'%');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hadPaidDeposit(): bool
    {
        return $this->payment && $this->payment->deposit_paid;
    }

    public function scopeWithNoDeposit($query)
    {
        return $query->whereHas('payment', function ($q) {
            $q->where('deposit_paid', false);
        });
    }

//    public function scopeWithoutDeposit($query)
//    {
//        return $query->where(function ($q) {
//            $q->whereHas('payment', function ($q) {
//                $q->where('deposit_paid', false);
//            })->oreWhereDoesntHave('payment');
//        });
//    }
    public function keys(): BelongsToMany
    {
        return $this->belongsToMany(Key::class, 'user_keys')->withPivot('remark', 'quantity', 'loaned_at', 'returned_at');
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function institutions(): BelongsToMany
    {
        return $this->belongsToMany(Institution::class, 'institution_users');
    }
}
