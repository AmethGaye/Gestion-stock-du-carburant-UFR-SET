<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dotation_admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'nombre_tickets',
        'user_id',
        'statut'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function administration():BelongsTo
    {
        return $this->belongsTo(Administration::class);
    }
}
