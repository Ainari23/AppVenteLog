@extends('layouts.app', [
    'namePage' => 'Fournisseurs',
    'class' => 'sidebar-mini',
    'activePage' => 'ajouter-fournisseur',
])
@section('content')
<div class="container">
    <h1>Ajouter un Fournisseur</h1>
    <form method="POST" action="{{ route('fournisseurs.store') }}">
        @csrf <!-- Ajoutez le jeton CSRF -->

        <div class="form-group">
            <label for="nom">Nom du Fournisseur</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse">
        </div>

        <div class="form-group">
            <label for="telephone">Numéro de téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone">
        </div>

        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        
        <div class="form-group">
            <label for="entreprise_id">Sélectionnez l'entreprise</label>
            <select id="entreprise_id" name="entreprise_id" class="form-control">
                @foreach($entreprises as $entreprise)
                    <option value="{{ $entreprise->id }}">{{ $entreprise->id }}{{ $entreprise->nom }}</option>
                @endforeach
            </select>
        </div>

        


        <button type="submit" class="btn btn-primary">Ajouter le Fournisseur</button>
    </form>
</div>
@endsection