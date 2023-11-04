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
                <td><a href="{{route('catégorie-produit.show', $CategorieProduit->id)}}" type="button" class="btn btn-secondary">Detail</a></td>
                <td><a href="{{route('catégorie-produit.edit', $CategorieProduit->id)}}" type="button" class="btn btn-warning">Editer</a></td>
                <td><form action="{{route('catégorie-produit.destroy', $CategorieProduit->id)}}"method="POST" type="button" class="btn btn-danger" onsubmit="return confirm('Delete?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">DELETE</button>
                </form>
                </td>
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