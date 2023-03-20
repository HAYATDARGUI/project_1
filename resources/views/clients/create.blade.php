@extends('layouts.app')

@section('title', 'Form Client')

@section('contents')
<form action="{{ route('clients.store')}}"
method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Client_Principale">{{__('Nom client principale:')}}</label>
                        <input type="text" id="Client_Principale" name="Client_Principale"
                            value="{{old('Client_Principale')}}" @error('Nom client principale') is-invalid @enderror
                            autocomplete="Nom client principale" autofocus>

                        @error('Nom client principale')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="Client_Societe">{{__('Societe :')}}</label>
                        <input type="text" id="Client_Societe" name="Client_Societe" value="{{old('Client_Societe')}}"
                            @error('Societe') is-invalid @enderror autocomplete="Societe" autofocus>

                        @error('Societe')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="Client_Ville">{{__('Ville :')}}</label>
                        <input type="text" id="Client_Ville" name="Client_Ville" value="{{old('$Client_Ville')}}"
                            @error('Ville') is-invalid @enderror autocomplete="Ville" autofocus>

                        @error('Ville')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Ville_Zone">{{__('Zone :')}}</label>
                        <input type="text" id="Ville_Zone" name="Ville_Zone" value="{{old('$Ville_Zone')}}"
                            @error('Zone') is-invalid @enderror autocomplete="Zone" autofocus>

                        @error('Zone')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Client_Tel">{{__('Telephone :')}}</label>
                        <input type="number" id="Client_Tel" name="Client_Tel" value="{{old('Client_Tel')}}"
                            @error('Telephone') is-invalid @enderror autocomplete="Telephone" autofocus>

                        @error('Telephone')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Client_Emails">{{__('Emails :')}}</label>
                        <input type="mail" id="Client_Emails" name="Client_Emails" value="{{old('Client_Emails')}}"
                            @error('Emails') is-invalid @enderror autocomplete="Emails" autofocus>

                        @error('Emails')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Client_Note">{{__('Note :')}}</label>
                        <input type="text" id="Client_Note" name="Client_Note" value="{{old('Client_Note')}}"
                            @error('Note') is-invalid @enderror autocomplete="Note" autofocus>

                        @error('Note')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" value="{{__('enregistrer')}}" >ajouter</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection