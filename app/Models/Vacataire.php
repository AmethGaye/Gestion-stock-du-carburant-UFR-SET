<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
      'telephone',
      'sexe'
    ];
    use HasFactory;

    public function cours():HasMany{
      return $this->hasMany(Cours::class);
    }

}
