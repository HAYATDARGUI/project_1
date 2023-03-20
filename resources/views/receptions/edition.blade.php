@extends('layouts.app')
@section('contents')

<form action="{{ route('receptions.update', $bonreception->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="BR_Date">{{__('La date :')}}</label>
                        <input type="date" id="BR_Date" name="BR_Date" value="{{$bonreception->BR_Date}}" @error('La
                            date') is-invalid @enderror autocomplete="La date" autofocus>

                        @error('La date')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="BR_Client">{{__('Client Principale :')}}</label>
                        <select id="BR_Client" name="BR_Client">
                            <option value="" selected disabled hidden>Toutes les Clients</option>
                            @foreach($clients as $client)
                            <option value="{{$client->Client_Principale}}">{{$client->Client_Principale}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">


                        <label for="BR_Qte">{{__('Qantite :')}}</label>
                        <input type="number" id="BR_Qte" name="BR_Qte" value="{{$bonreception->BR_Qte}}" @error('Qantite')
                            is-invalid @enderror autocomplete="Qantite" autofocus>

                        @error('Qantite')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="BR_Transporte">{{__('Transporte :')}}</label>
                        <input type="text" id="BR_Transporte" name="BR_Transporte"
                            value="{{$bonreception->BR_Transporte}}" @error('Transporte') is-invalid @enderror
                            autocomplete="Transporte" autofocus>

                        @error('Transporte')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="BR_Note">{{__('remarque  :')}}</label>
                        <input type="text" id="BR_Note" name="BR_Note" value="{{$bonreception->BR_Note}}" @error('Note')
                            is-invalid @enderror autocomplete="Note" autofocus>

                        @error('Note')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="BR_NoDocument">{{__('No Document :')}}</label>
                        <input type="text" id="BR_NoDocument" name="BR_NoDocument"
                            value="{{$bonreception->BR_NoDocument}}" @error('No Document') is-invalid @enderror
                            autocomplete="No Document" autofocus>

                        @error('No Document')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <label for="Client_Ville">{{__('Ville :')}}</label>
                        <input type="text" id="Client_Ville" name="Client_Ville" value="{{$clients->Client_Ville}}"
                            @error('ville') is-invalid @enderror autocomplete="ville" autofocus>

                        @error('ville')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Ville_Zone">{{__('Zone :')}}</label>
                        <input type="text" id="Ville_Zone" name="Ville_Zone" value="{{$clients->Ville_Zone}}"
                            @error('Zone') is-invalid @enderror autocomplete="Zone" autofocus>

                        @error('Zone')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="dBR_Produit">{{__('Nom de produit :')}}</label>
                        <select id="dBR_Produit" name="dBR_Produit">
                            <option value="" selected disabled hidden>Toutes les produits</option>
                            @foreach($produits as $produit)
                            <option value="{{$produit->Produit_Nom}}">{{$produit->Produit_Nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dBR_BR">{{__('Bon de Reception No :')}}</label>
                        <input type="number" id="dBR_BR" name="dBR_BR" value="{{$detail_br->dBR_BR}}" @error('dBR_BR')
                            is-invalid @enderror autocomplete="dBR_BR" autofocus>

                        @error('dBR_BR')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dBR_SN">{{__('SN :')}}</label>
                        <input type="number" id="dBR_SN" name="dBR_SN" value="{{$detail_br->dBR_SN}}" @error('SN')
                            is-invalid @enderror autocomplete="SN" autofocus>

                        @error('SN')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dBR_Etat_Reparation">{{__("Etat de reparation :")}}</label>
                        <input type="text" id="dBR_Etat_Reparation" name="dBR_Etat_Reparation"
                            value="{{old('dBR_Etat_Reparation', 'en cours')}}" @error('reference de reparation')
                            is-invalid @enderror autocomplete="reference de reparation" autofocus>

                        @error('reference de reparation')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dBR_Garantie">{{__("Garantie :")}}</label>
                        <input type="radio" id="dBR_Garantie" name="dBR_Garantie" value="{{$detail_br->dBR_Garantie}}"
                            @error('dBR_Garantie') is-invalid @enderror autocomplete="dBR_Garantie" autofocus>

                        @error('dBR_Garantie')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dBR_Accessoires">{{__("Accessoires :")}}</label>
                        <input type="text" id="dBR_Accessoires" name="dBR_Accessoires"
                            value="{{$detail_br->dBR_Accessoires}}" @error('dBR_Accessoires') is-invalid @enderror
                            autocomplete="dBR_Accessoires" autofocus>

                        @error('dBR_Accessoires')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" value="{{__('enregistrer')}}">ajouter</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection