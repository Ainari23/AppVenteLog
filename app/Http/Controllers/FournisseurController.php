<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Entreprise;


use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function create()
{
    $entreprises = Entreprise::all(); // Récupérez la liste des entreprises
    return view('ajouter-fournisseur', compact('entreprises'));
}

public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'entreprise_id' => 'required|exists:entreprises,id', // Assurez-vous que l'ID de l'entreprise existe dans la table entreprises
    ]);
    // Créer un nouveau fournisseur en utilisant les données validées
    $fournisseur = new Fournisseur([
        'nom' => $request->input('nom'),
        'adresse' => $request->input('adresse'),
        'telephone' => $request->input('telephone'),
        'email' => $request->input('email'),
    ]);

    // Associez le fournisseur à l'entreprise en utilisant l'ID de l'entreprise soumis
    $fournisseur->entreprise_id = $request->input('entreprise_id');
    $fournisseur->save();

    return redirect()->route('fournisseurs.create')->with('success', 'Fournisseur ajouté avec succès');
}
}
