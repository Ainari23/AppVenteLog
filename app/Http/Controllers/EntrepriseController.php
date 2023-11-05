<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Utilisateur;
use App\Http\Requests\EntrepriseRequest; 

class EntrepriseController extends Controller
{
    public function index(){
        $entreprises =  Entreprise::all();
        return view('ajouter-entreprise',compact('entreprises'));
    }
    public function create(EntrepriseRequest $request)
    {
        $entreprises = Entreprise::all(); // Récupérez la liste des entreprises

        return view('ajouter-entreprise', compact('entreprises'));
    }

    public function store(EntrepriseRequest $request)
    {
        $validatedData = $request->validated();
        if (Entreprise::where('nom', $validatedData['nom'])->exists()) {
            return redirect()->route('entreprises.create')->withErrors(['nom' => 'Ce nom d\'entreprise est déjà utilisé.']);
        }
        // Créez une nouvelle entreprise en utilisant les données validées
        $entreprise = Entreprise::create($validatedData);

        return redirect()->route('entreprises.create')->with('success', 'Entreprise ajoutée avec succès');
    }
    
}
