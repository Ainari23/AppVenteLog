<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModesPaiement extends Model
{
    protected $fillable = [
        'nom_mode_paiement',
        'informations_supplementaires'
    ];
}
