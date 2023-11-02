@extends('layouts.app', [
    'namePage' => 'Entreprises',
    'class' => 'sidebar-mini',
    'activePage' => 'ajouter-entreprise',
])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter une entreprise</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('entreprises.store') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nom">Nom de l'entreprise</label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="adresse">Adresse de l'entreprise</label>
                            <input type="text" id="adresse" name="adresse" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Adresse e-mail de l'entreprise (unique)</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="telephone">Numéro de téléphone de l'entreprise</label>
                            <input type="text" id="telephone" name="telephone" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description de l'entreprise</label>
                            <textarea id="description" name="description" class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="pays">Pays de l'entreprise</label>
                            <input type="text" id="pays" name="pays" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="logo">Logo de l'entreprise</label>
                            <input type="file" id="logo" name="logo" class="form-control-file">
                        </div>
                        
                        <div class="form-group">
                            <label for="site_web">Site web de l'entreprise</label>
                            <input type="text" id="site_web" name="site_web" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="statut_approval">Statut d'approbation de l'entreprise</label>
                            <select id="statut_approval" name="statut_approval" class="form-control">
                                <option value="0">Non approuvé</option>
                                <option value="1">Approuvé</option>
                            </select>
                        </div>
                        <hr>

                        <h4>Ajouter des employés</h4>

                        

                        <button type="submit" class="btn btn-primary">Ajouter l'entreprise</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection