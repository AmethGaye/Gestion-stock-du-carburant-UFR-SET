<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Administration extends Model
{
    use HasFactory;

    public function dotation_admins():HasMany
    {
        return $this->hasMany(Dotation_admin::class);
    }
}
