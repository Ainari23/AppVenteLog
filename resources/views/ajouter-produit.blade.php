@extends('layouts.app', [
    'namePage' => 'Produits',
    'class' => 'sidebar-mini',
    'activePage' => 'ajouter-produit',
])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="container">
    <h1>Ajouter un Produit</h1>
    <form method="POST" action="{{ route('ajouter-produit.store') }}">
        @csrf <!-- Ajoutez le jeton CSRF -->

        <div class="form-group">
            <label for="nom">Nom du Produit</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="description">Description du Produit</label>
            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="prix_unitaire">Prix Unitaire</label>
            <input type="number" step="0.01" class="form-control" id="prix_unitaire" name="prix_unitaire" required>
        </div>

        <div class="form-group">
            <label for="quantite_en_stock">Quantité en Stock</label>
            <input type="number" class="form-control" id="quantite_en_stock" name="quantite_en_stock" required>
        </div>

        <div class="form-group">
            <label for="code_categorie">Code de Catégorie</label>
            <input type="text" class="form-control" id="code_categorie" name="code_categorie" required>
        </div>

        <div class="form-group">
            <label for="fournisseur_id">Sélectionnez le fournisseur</label>
            <select id="fournisseur_id" name="fournisseur_id" class="form-control">
                @foreach($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->id }}">{{ $fournisseur->id }}{{ $fournisseur->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter le Produit</button>
    </form>
</div>
@endsection