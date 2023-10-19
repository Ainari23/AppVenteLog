<?php

namespace App\Http\Controllers;
use App\Models\DroitVendeur;
use App\Models\Utilisateur; 
use App\Models\Role; 


use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function attribuerRoleAdmin()
    {
        $utilisateurId = request('utilisateur_id'); // Obtenez l'ID de l'utilisateur depuis la requête
        $utilisateur = Utilisateur::find($utilisateurId);
        $roleAdmin = DroitVendeur::where('nom_role', 'Administrateur')->first();

        $utilisateur->roles()->attach($roleAdmin);

        // Redirection vers une vue de confirmation
        return view('confirmation')->with('message', 'Rôle d\'Administrateur attribué avec succès');

    }

    public function attribuerRoleFournisseur()
    {
        $utilisateurId = request('utilisateur_id'); // Obtenez l'ID de l'utilisateur depuis la requête
        $utilisateur = Utilisateur::find($utilisateurId);
        $roleFournisseur = DroitVendeur::where('nom_role', 'Fournisseur')->first();

        $utilisateur->roles()->attach($roleFournisseur);

        // Redirection vers une vue de confirmation
        return view('confirmation')->with('message', 'Rôle de\'Fournisseurs attribué avec succès');
    }
    public function attribuerRoleGestionnaireStock()
    {
        $utilisateurId = request('utilisateur_id'); // Obtenez l'ID de l'utilisateur depuis la requête
        $utilisateur = Utilisateur::find($utilisateurId);
        $roleGestionnaireStock = DroitVendeur::where('nom_role', 'Gestionnaire de Stock')->first();

        $utilisateur->roles()->attach($roleGestionnaireStock);

        // Redirection vers une vue de confirmation
        return view('confirmation')->with('message', 'Rôle de\'Gestionnaire_Stock attribué avec succès');
    }
    public function attribuerRoleVendeur()
    {
        $utilisateurId = request('utilisateur_id'); // Obtenez l'ID de l'utilisateur depuis la requête
        $utilisateur = Utilisateur::find($utilisateurId);
        $roleVendeur = DroitVendeur::where('nom_role', 'Vendeur')->first();

        $utilisateur->roles()->attach($roleVendeur);

        // Redirection vers une vue de confirmation
        return view('confirmation')->with('message', 'Rôle de Vendeur attribué avec succès');
    }
    public function attribuerRoleEmploye()
    {
        $utilisateurId = request('utilisateur_id'); // Obtenez l'ID de l'utilisateur depuis la requête
        $utilisateur = Utilisateur::find($utilisateurId);
        $roleEmploye = DroitVendeur::where('nom_role', 'Employé')->first();

        $utilisateur->roles()->attach($roleEmploye);

        // Redirection vers une vue de confirmation
        return view('confirmation')->with('message', 'Rôle d\'Employé attribué avec succès');
    }

}
