<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cours extends Model
{
    use HasFactory;
    protected $fillable=['filiere_id','matiere_id','vacataire_id','duree','remarque','date','statut', 'demande'];



    public function matiere():BelongsTo
    {
        return $this->belongsTo(Matiere::class);
    }

    public function vacataire():BelongsTo
    {
        return $this->belongsTo(Vacataire::class);
    }
    public function filiere():BelongsTo
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }
    public function remboursement():HasOne
    {
        return $this->hasOne(Remboursement_vac::class);
    }
}
