<?php

namespace App\Models;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = [
        'nom',
        'adresse',
        'email',
        'telephone',
        'description',
        'pays',
        'logo',
        'site_web',
        'statut_approval',
    ];

    public function utilisateur()
    {
        return $this->hasMany(Utilisateur::class, 'entreprise_utilisateur', 'entreprise_id', 'utilisateur_id');
    }
}
