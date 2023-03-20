@extends('layouts.app')

@section('title', 'Liste des Clients')

@section("contents")
<div class="card shadow mb-4">
    <div class="card-body">
    <a href="clients/create" class="btn btn-primary mb-3">Ajouter</a>
    @if(count($clients)>0)
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                    <th>Nom de Client Principale</th>
                    <th>Societe</th>
                    <th>Ville</th>
                    <th>Telephone</th>
                    <th>Emails</th>
                    <th>Note</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client )
                    <tr>
                        <td>{{$client->Client_Principale}}</td>
                        <td>{{$client->Client_Societe}}</td>
                        <td >{{$client->villes->Ville_Nom}}</td>
                        <td >{{$client->Client_Tel}}</td>
                        <td>{{$client->Client_Emails}}</td>
                        <td>{{$client->Client_Note}}</td>
                        <td>
                            <div class="actions">
                                <a href="modifier/{{$client->id}}" class="btn btn-warning">Modifier</a>
                                <form id="{{$client->id}}" method="POST" action="{{ route('clients.delete',$client->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="event.preventDefault();
                                        if(confirm('Êtes-vous sûr ?'))
                                        document.getElementById({{$client->id}}).submit();" type="submit">
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
        <p>Aucun client disponible dans la base de données</p>
    @endif
    </div>
    </div>
    </div>
@endsection