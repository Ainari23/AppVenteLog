<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    
    protected $table = 'utilisateur';
    public function roles()
{
    return $this->belongsToMany(DroitVendeur::class, 'liaison_utilisateur_role', 'utilisateur_id', 'role_id');
}
    public function entreprises()
    {
        return $this->belongsTo(Entreprise::class);
    }


}
