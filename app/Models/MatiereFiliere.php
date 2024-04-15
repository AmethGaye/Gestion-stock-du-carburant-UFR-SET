<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatiereFiliere extends Model
{
    protected $fillable=['matiere_id','filiere_id'];
    use HasFactory;

}
