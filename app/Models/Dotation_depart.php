<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dotation_depart extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_tickets',
        'departement_id',
        'user_id',
        'statut'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }
}
