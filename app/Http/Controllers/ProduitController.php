<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fournisseur;
use App\Models\Produit; 
use App\Models\User;
use App\Http\Requests\ProduitRequest; 
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProduitController extends Controller
{
    public function index(){
        $fournisseurs =  Fournisseur::all();
        return view('ajouter-produit',compact('fournisseurs'));
    }
    
    public function create(ProduitRequest $request)
    {
        $fournisseurs = Fournisseur::all();
        return view('ajouter-produit', compact('fournisseurs'));
    }

    public function store(ProduitRequest $request)
    {
        dd($request->all());
        $produit = Produit::create($validatedData);
        // Set a default value if 'fournisseur_id' is not provided
        if (!isset($validatedData['fournisseur_id'])) {
            $validatedData['fournisseur_id'] = $defaultFournisseurId; 
        }
        
        return redirect()->route('ajouter-produit.create')->with('success', 'Produit ajouté avec succès');
    }
}
