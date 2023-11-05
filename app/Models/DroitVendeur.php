<?php
namespace App\Models;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;

class DroitVendeur extends Model
{
    protected $table = 'droits_vendeur'; // Nom de la table dans la base de données

    protected $fillable = ['nom_role', 'description_role'];

    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class, 'liaison_utilisateur_role', 'role_id', 'utilisateur_id');
    }
}

