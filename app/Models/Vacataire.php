<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacataire extends Model
{
    protected $fillable=[
      'nom',
      'prenom',
      'provenance',
      'origine',
      'email',
      'status',
      'situation',
      'telephone'
    ];
    use HasFactory;
}
