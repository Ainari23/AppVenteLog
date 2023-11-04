@extends('layouts.app', [
    'namePage' => 'Categories',
    'class' => 'sidebar-mini',
    'activePage' => 'ajouter-catégorie-produit',
])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter une catégorie de produit</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ajouter-catégorie-produit.store') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nom">Nom du catégorie</label>
                            <input type="text" id="nom" name="nom_categorie" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Ajouter aux catégories</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection