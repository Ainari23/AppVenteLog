<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;     

class UtilisateurController extends Controller
{
    public function afficherFormulaire()
{
    return view('creer-utilisateur');
}
    public function creerUtilisateur(Request $request)
{
    $donneesValides = $request->validate([
        'nom_utilisateur' => 'required|unique:utilisateur,nom_utilisateur',
        'mot_de_passe' => 'required|min:8',
        'roles' => 'required',
    ]);

    // Créer un nouvel utilisateur
    $nouvelUtilisateur = new Utilisateur;
    $nouvelUtilisateur->nom_utilisateur = $donneesValides['nom_utilisateur'];
    $nouvelUtilisateur->mot_de_passe = bcrypt($donneesValides['mot_de_passe']);
    $nouvelUtilisateur->roles = $donneesValides['roles'];
    $nouvelUtilisateur->save();

    // Rediriger ou afficher un message de succès
    return redirect('/')->with('message', 'Utilisateur créé avec succès.');
}
}
