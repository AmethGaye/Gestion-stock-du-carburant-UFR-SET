<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Remboursement_vac extends Model
{
    use HasFactory;

    public function vacataire():BelongsTo
    {
        return $this->belongsTo(Vacataire::class);
    }
    
    public function matiere():BelongsTo
    {
        return $this->belongsTo(Matiere::class);
    }

    public function comptable():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
