<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Filiere extends Model
{
    use HasFactory;

    public function departement(): BelongsTo{
        return $this->belongsTo(Departement::class);
    }

    public function matieres():BelongsToMany
    {
        return $this->belongsToMany(Matiere::class);
    }
    public function cours()
    {
        return $this->hasMany(Cours::class, 'filiere_id');
    }
    public function matiere()
    {
        return $this->belongsToMany(Matiere::class, 'matieres_filieres');
    }
}
