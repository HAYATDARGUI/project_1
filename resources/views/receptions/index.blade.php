@extends('layouts.app')
@section("meta")
<title>Liste des Receptions</title>
@endsection
@section("contents")

<div class="card shadow mb-4">
    <div class="card-body">
        <a href="receptions/create" class="btn btn-primary mb-3">Ajouter</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Client Principale</th>
                        <th>Societe</th>
                        <th>Ville</th>
                        <th>Zones</th>
                        <th>Qantite</th>
                        <th>Transport</th>
                        <th>Produit</th>
                        <th>Note</th>
                    </tr>
                </thead>
                @if(!is_null($receptions) && count($receptions)>0)
                <tbody>
                    @foreach ($receptions as $reception)
                    <tr>
                        <td>{{$reception->BR_Date}}</td>
                        @if($reception->clients)
                        <td>{{$reception->clients->Client_Principale}}</td>
                        @else
                        <td>client non disponible</td>
                        @endif
                        @if($reception->clients)
                        <td>{{$reception->clients->Client_Societe}}</td>
                        @else
                        <td>societe non disponible</td>
                        @endif
                        @if($reception->clients && $reception->clients->villes)
                        <td> {{$reception->clients->villes->Ville_Nom}}</td>
                        @elseif($reception->clients)
                        <td>client sans ville</td>
                        @else
                        <td>ville non disponible</td>
                        @endif

                        @if($reception->clients && $reception->clients->villes && $reception->clients->villes->zones)
                        <td>{{$reception->clients->villes->zones->Zone_Nom}}</td>
                        @else
                        <td>Zone non disponible</td>
                        @endif
                        <td>{{$reception->BR_Qte}}</td>
                        <td>{{$reception->transports->Transport_Nom}}</td>

                        <td>
                            @if($reception->Detail_Br)
                            @foreach($reception->Detail_Br as $detail_br)
                            {{$detail_br->Produits->Produit_Nom}}<br>
                            @endforeach
                            @endif
                        </td>

                        <td>{{$reception->BR_Note}}</td>
                        <td>
                            <div class="actions">
                                <a href="edition/{{$reception->id}}" class="btn btn-warning">Modifier</a>
                                <form id="{{$reception->id}}" method="POST" action="{{ route('receptions.delete',$reception->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"  onclick="event.preventDefault();
                                        if(confirm('Êtes-vous sûr ?'))
                                        document.getElementById({{$reception->id}}).submit();" type="submit">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@else
<p>Liste de reception est vide dans la base de données</p>
@endif
@endsection