@extends('layouts.app')
@section('title')
Modifier {{$clients->Client_Nom}}
@endsection

@section('contents')
<div>
    <h3 class="modif">
        Modification de <span>{{$clients->Client_Principale}}</span>
    </h3>
</div>

<form action="{{ route('clients.update', $clients->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Client_Principale">{{__('Nom client principale:')}}</label>
                        <input type="text" id="Client_Principale" name="Client_Principale"
                            value="{{$clients->Client_Principale}}" @error('nom client principale') is-invalid @enderror
                            autocomplete="nom client principale" autofocus>

                        @error('nom client principale')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="Client_Societe">{{__('Societe :')}}</label>
                        <input type="text" id="Client_Societe" name="Client_Societe"
                            value="{{$clients->Client_Societe}}" @error('societe') is-invalid @enderror
                            autocomplete="societe" autofocus>

                        @error('societe')
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
                        <label for="Client_Tel">{{__('Telephone :')}}</label>
                        <input type="number" id="Client_Tel" name="Client_Tel" value="{{$clients->Client_Tel}}"
                            @error('Telephone') is-invalid @enderror autocomplete="Telephone" autofocus>

                        @error('Telephone')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Client_Emails">{{__('Emails :')}}</label>
                        <input type="mail" id="Client_Emails" name="Client_Emails" value="{{$clients->Client_Emails}}"
                            @error('Emails') is-invalid @enderror autocomplete="Emails" autofocus>

                        @error('Emails')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="Client_Note">{{__('Note :')}}</label>
                        <input type="text" id="Client_Note" name="Client_Note" value="{{$clients->Client_Note}}"
                            @error('note') is-invalid @enderror autocomplete="note" autofocus>

                        @error('note')
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