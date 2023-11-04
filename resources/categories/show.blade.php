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
                <td>{{ $CategorieProduit->nom_categorie }} @readonly(true)</td>
                </tr>
                </tbody>
@endsection