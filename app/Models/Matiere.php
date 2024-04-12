<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Matiere extends Model
{
    use HasFactory;



    public function cours():HasMany{
        return $this->hasMany(Cours::class);
    }
    

    public function remboursement():HasMany{
        return $this->hasMany(Remboursement_vac::class);
    }

    public function filieres():BelongsToMany
    {
        return $this->belongsToMany(Filiere::class);
    }
}
