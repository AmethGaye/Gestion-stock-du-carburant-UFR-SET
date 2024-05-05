<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = ['volume','prix_unitaire', 'prix_total', 'nombre_ticket', 'entrees', 'sorties', 'tickets_apres_entrees'];

    public function user():HasOne
    {
        return $this->hasOne(User::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
