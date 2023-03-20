@extends('layouts.app')

@section('title', 'Form Produit')

@section('contents')
<form method="POST" action="{{ route('produits.store')}}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Produit_Nom">{{__('Nom de produit :')}}</label>
                        <input type="text" id="Produit_Nom" name="Produit_Nom" value="{{old('Produit_Nom')}}"
                            @error('Nom de produit') is-invalid @enderror autocomplete="Nom de produit" autofocus>

                        @error('Nom de produit')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">


                        <label for="Produit_Ref">{{__('Reference :')}}</label>
                        <input type="text" id="Produit_Ref" name="Produit_Ref" value="{{old('Produit_Ref')}}"
                            @error('Reference') is-invalid @enderror autocomplete="Reference" autofocus>

                        @error('Reference')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <label for="Nouvelle_Cathegorie">{{__('Nouvelle catégorie :')}}</label>
                        <input type="text" id="Nouvelle_Cathegorie" name="Nouvelle_Cathegorie"
                            value="{{old('Nouvelle_Cathegorie')}}" autocomplete="off">

                        @if ($errors->has('Nouvelle_Cathegorie'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('Nouvelle_Cathegorie') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Produit_Cath">{{__('Categories :')}}</label>
                        <select id="Produit_Cath" name="Produit_Cath">
                            @foreach($Cathegories as $cathegorie)
                            <option value="{{$cathegorie->id}}">{{$cathegorie->Cath_Designation}}</option>
                            @endforeach
                        </select>

                        @error('Categories')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Produit_Description">{{__('Description de produit :')}}</label>
                        <input type="text" id="Produit_Description" name="Produit_Description"
                            value="{{old('Produit_Description')}}" @error('Description de produit') is-invalid @enderror
                            autocomplete="Description de produit" autofocus>

                        @error('Description de produit')
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