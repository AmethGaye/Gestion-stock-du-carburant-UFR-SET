<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Remboursement_vac extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_heure',
        'nombre_tickets',
        'user_id',
        'cours_id',
        'statut',
    ];
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cours():hasOne
    {
        return $this->hasOne(Cours::class);
    }

}
