<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'email',
        'password',
        'prenom',
        'role',
        'telephone',
        'status',
        'date_naiss',
        'image',
        'sexe',
        'ufr_id',
        'departement_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function ufr():BelongsTo{
        return $this->belongsTo(Ufr::class);
    }

    public function remboursement():HasMany{
        return $this->hasMany(Remboursement_vac::class);
    }

    public function Activites():HasMany
    {
        return $this->hasMany(Activite::class);
    }
    
    public function dotation_admins():HasMany
    {
        return $this->hasMany(Activite::class);
    }

    public function dotation_departs():HasMany
    {
        return $this->hasMany(Activite::class);
    }

    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }

}
