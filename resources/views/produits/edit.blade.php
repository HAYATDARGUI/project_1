@extends('layouts.app')
@section('title')
modifier {{$produits->Produit_Nom}}
@endsection

@section("contents")
<div>
    <h3 class="modif">
        Modification de <span>{{$produits->Produit_Nom}}</span>
    </h3>
</div>

<form action="{{ route('produits.update', $produits->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Produit_Nom">{{__('Nom de produit:')}}</label>
                        <input type="text" id="Produit_Nom" name="Produit_Nom" value="{{$produits->Produit_Nom}}"
                            @error('Nom de produit') is-invalid @enderror autocomplete="Nom de produit" autofocus>

                        @error('Nom de produit')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">


                        <label for="Produit_Ref">{{__('Reference :')}}</label>
                        <input type="text" id="Produit_Ref" name="Produit_Ref" value="{{$produits->Produit_Ref}}"
                            @error('Reference') is-invalid @enderror autocomplete="Reference" autofocus>

                        @error('Reference')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">


                        <label for="Produit_Cath">{{__('Categories :')}}</label>
                        <select id="Produit_Cath" name="Produit_Cath">
                            @foreach($Cathegories as $Cathegorie)
                            <option value="{{$Cathegorie->id}}">{{$Cathegorie->Cath_Designation}}</option>
                            @endforeach
                        </select>

                        @error('ville')
                        <span class="error">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Produit_Description">{{__('Description de produit :')}}</label>
                        <input type="text" id="Produit_Description" name="Produit_Description"
                            value="{{$produits->Produit_Description}}" @error('Description de produit') is-invalid
                            @enderror autocomplete="Description de produit" autofocus>

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