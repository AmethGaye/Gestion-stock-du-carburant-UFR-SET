<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected  $fillable=[
        'titre',
        'ticket',
        'description',
        'lieux',
        'status',
        'adresse',
        'date',
        'user_id'

    ];
    use HasFactory;
}
