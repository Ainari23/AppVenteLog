<?php

namespace App\Models;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nom', 'description'];
    
    public function utilisateurs()
    {
        return $this->belongsToMany(Utilisateur::class, 'liaison_utilisateur_role', 'role_id', 'utilisateur_id');
    }
}
