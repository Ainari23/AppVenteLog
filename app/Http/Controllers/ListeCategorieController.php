<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategorieProduitRequest; 
use App\Models\CategorieProduit; 

class ListeCategorieController extends Controller
{
    //
    public function index()
     {
         $categoriesProduits =  CategorieProduit::orderBy('nom_categorie', 'asc')->get();
        return view('/produits/categorie-produit',compact('categoriesProduits'));
     }
     public function create()
    {
        return view('categories_produits.create');
    }

    public function store(CategorieProduitRequest $request)
    {
        $categorieProduit = new CategorieProduit();

        $categorieProduit->name = $request->input('name');

        $categorieProduit->save();

        return redirect()->route('categories_produits.index');
    }

    public function show($id)
    {
        $categorieProduit = CategorieProduit::find($id);

        return view('categories.show', compact('categorieProduit'));
    }

    public function edit($id)
    {
        $categorieProduit = CategorieProduit::find($id);

        return view('categories.edit', compact('categorieProduit'));
    }

    public function update(CategorieProduitRequest $request, $id)
    {
        $categorieProduit = CategorieProduit::find($id);

        $categorieProduit->name = $request->input('name');

        $categorieProduit->save();
         
        return redirect()->route('ajouter-catégorie-produit.index');
    }

    public function destroy($id)
    {
        $categorieProduit = CategorieProduit::find($id);

        if ($categorieProduit != null) {
        $categorieProduit->delete($id);
        return redirect()->route('categories_produits.index');
    }
    }
}
