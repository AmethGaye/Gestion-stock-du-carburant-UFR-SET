<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activite extends Model
{
    protected  $fillable=[
        'titre',
        'ticket',
        'ticket_demande',
        'description',
        'lieux',
        'status',
        'adresse',
        'date',
        'user_id'

    ];

    protected $attributes = ['ticket' => 0];

    use HasFactory;

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
