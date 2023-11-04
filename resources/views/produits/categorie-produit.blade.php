@extends('layouts.app', [
    'namePage' => 'Produits',
    'class' => 'sidebar-mini',
    'activePage' => 'catégorie-produit',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Liste Des Catégories</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                Catégories Produit
                </th>
                <th>Actions</th>
              </thead>
              <tbody>
                <tr>
                @foreach ($categoriesProduits as $CategorieProduit)
                <td>{{ $CategorieProduit->nom_categorie }}</td>
                <td><a href="{{ url('/produits/catégorie-produit') }}" class="btn btn-danger"> <i class="now-ui-icons gestures_tap-01"></i>Supprimer </a><form method="delete" action="{{ route('envoyer-au-vendeur') }}"></td>
                <td><a href="{{ url('/produits/catégorie-produit') }}" class="btn btn-danger"> <i class="now-ui-icons gestures_tap-01"></i>Modifier </a><form method="update" action="{{ route('envoyer-au-vendeur') }}"></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection