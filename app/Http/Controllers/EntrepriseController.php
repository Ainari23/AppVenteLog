<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Utilisateur;

class EntrepriseController extends Controller
{
    public function create()
    {
        $entreprises = Entreprise::all(); // Récupérez la liste des entreprises
        $utilisateurs = Utilisateur::all(); // Récupérez la liste des utilisateurs

        return view('ajouter-entreprise', compact('entreprises', 'utilisateurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|unique:entreprises|max:255',
            'telephone' => 'required|string|max:20',
            'description' => 'nullable|string',
            'pays' => 'nullable|string|max:255',
            'logo' => 'nullable|string|max:255',
            'site_web' => 'nullable|url|max:255',
            'statut_approval' => 'boolean',
        ]);
        // Créez une nouvelle entreprise en utilisant les données validées
        $entreprise = new Entreprise($request->all());
        $entreprise->save();
        
        // Attachez les employés sélectionnés à l'entreprise
        if ($request->has('employes') && is_array($request->employes)) {
            foreach ($request->employes as $employeId) {
                $utilisateur = Utilisateur::find($employeId);
                if ($utilisateur) {
                    $utilisateur->entreprise_id = $entreprise->id;
                    $utilisateur->save();
                }
            }
        }

        return redirect()->route('entreprises.create')->with('success', 'Entreprise et employé ajoutée avec succès');
    }
}
