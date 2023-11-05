<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DroitsUtilisateur extends Model
{
    protected $fillable = [
        'nom_droit',
        'description_droit'
    ];
}
