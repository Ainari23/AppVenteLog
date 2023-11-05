<?php

namespace App\Models;
use App\Models\Utilisateur;
use App\Models\Autorisation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiaisonUtilisateurAutorisation extends Model
{
    protected $fillable = [
        'utilisateur_id',
        'autorisation_id'
    ];
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
    public function autorisation()
    {
        return $this->belongsTo(Autorisation::class, 'autorisation_id');
    }
}
