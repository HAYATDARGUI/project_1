@extends('layouts.app')

@section('title', 'Liste des Produits')

@section("contents")
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="produits/create" class="btn btn-primary mb-3">Ajouter</a>
        @if(count($produits)>0)
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom de Produit</th>
                        <th>Reference</th>
                        <th>Categorie</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit)
                    <tr>
                        <td>{{$produit->Produit_Nom}}</td>
                        <td>{{$produit->Produit_Ref}}</td>
                        <td>
                            @if($produit->cathegories)
                            {{$produit->cathegories->Cath_Designation}}
                            @else
                            Catégorie non disponible
                            @endif
                        </td>
                        <td>{{$produit->Produit_Description}}</td>
                        <td>
                            <div class="actions">
                                <a href="edit/{{$produit->id}}" class="btn btn-warning">Modifier</a>
                                <form id="{{$produit->id}}" method="POST"
                                    action="{{ route('produits.delete',$produit->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="event.preventDefault();
                                        if(confirm('Êtes-vous sûr ?'))
                                        document.getElementById({{$produit->id}}).submit();" type="submit">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>Aucun produit disponible dans la base de données</p>
            @endif
        </div>
    </div>
</div>
@endsection