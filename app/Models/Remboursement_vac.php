<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Remboursement_vac extends Model
{
    use HasFactory;

    public function cours():HasOne
    {
        return $this->HasOne(Cours::class);
    }

    public function comptable():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
