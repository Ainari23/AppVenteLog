<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategorieProduitRequest; 
use App\Models\CategorieProduit; 

class CategorieProduitController extends Controller
{
     public function index()
     {
        return view('/ajouter-catégorie-produit');
     }
     public function create()
     {
        return view('categorie_produits.create');//ajouter-catégorie-produit.store
     }
     public function store(CategorieProduitRequest $request)
     {
        $categorieProduit = new CategorieProduit();

        $categorieProduit->nom_categorie = $request->input('nom_categorie');

        $categorieProduit->save();

        session()->flash('message', 'La catégorie a été ajoutée avec succès.');
        return redirect()->route('ajouter-catégorie-produit.index');
     }
     public function show($id)
     {
         //
     }
     public function edit($id)
     {
         //
     }
     public function update(CategorieProduitRequest $request, $id)
     {
         //
     }
     public function destroy($id)
     {
         //
     }
}
