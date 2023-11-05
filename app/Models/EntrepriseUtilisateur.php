<?php

namespace App\Models;
use App\Models\Entreprise;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntrepriseUtilisateur extends Model
{
    protected $fillable = [
        'entreprise_id',
        'utilisateur_id',
    ];
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
}
