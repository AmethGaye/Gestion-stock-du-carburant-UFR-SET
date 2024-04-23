<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Departement extends Model
{
    use HasFactory;

    public function dotation_departs() : HasMany
    {
        return $this->hasMany(Dotation_depart::class);
    }


    public function filieres() : HasMany
    {
        return $this->hasMany(Filiere::class);
    }



    public function users():HasMany
    {
        return $this->hasMany(User::class);
    }
    

    public function ufr(): BelongsTo{
        return $this->belongsTo(Ufr::class);
    }
}
