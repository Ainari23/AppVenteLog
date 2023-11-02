@extends('layouts.app', [
    'namePage' => 'Entreprises',
    'class' => 'sidebar-mini',
    'activePage' => 'liste-entreprise',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Liste Des Entreprises</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                    Logo
                </th>
                <th>
                Nom Entrepise
                </th>
                <th>
                Adresse Entreprise
                </th>
                <th>
                  Mail
                </th>
                <th>
                  Telephone
                </th>
                <th>
                  Description
                </th>
                <th>
                  Pays
                </th>
                <th>
                    Site Web
                </th>
              </thead>
              <tbody>
                <tr>
                @foreach ($entreprises as $entreprise)
                  <td><img src="" alt="">{{ $entreprise->logo }}</td>
                  <td> {{ $entreprise->nom }}</td>
                  <td> {{ $entreprise->adresse }}</td>
                  <td> {{ $entreprise->email }}</td>
                  <td> {{ $entreprise->telephone }}</td>
                  <td> {{ $entreprise->description }}</td>
                  <td> {{ $entreprise->pays }}</td>
                  <td> {{ $entreprise->site_web }}</td>
                  <td> {{ $entreprise->statut_approuval }}</td>
                  
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