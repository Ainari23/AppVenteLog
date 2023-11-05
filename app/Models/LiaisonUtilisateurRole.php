<?php

namespace App\Models;
use App\Models\Utilisateur;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiaisonUtilisateurRole extends Model
{
    protected $fillable = [
        'utilisateur_id',
        'role_id'
    ];
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'utilisateur_id');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
