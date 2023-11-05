<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorisationMvmtStock extends Model
{
    protected $fillable = [
        'nom_autorisation',
        'description_autorisation'
    ];
}
