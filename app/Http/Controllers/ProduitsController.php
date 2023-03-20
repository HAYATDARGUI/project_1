<?php

namespace App\Http\Controllers;

use App\Models\Cathegories;
use App\Models\Produits;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    public function index()
    {
     $produits=Produits::get();
     return view("produits.index",compact('produits'));
    }
    public function create()
    {
    $Cathegories = Cathegories::all();
    return view("produits.create", compact('Cathegories'));
    }

    public function store(Request $request)
    {
        $cathegories=new Cathegories();
        if($request->Nouvelle_Cathegorie) {
            $cathegories->Cath_Designation = $request->Nouvelle_Cathegorie;
        } else {
            $cathegories->Cath_Designation = $request->Produit_Cath;
        }
        $cathegories->Cath_Nom = $request->Cath_Nom;
        $cathegories->save();

        $produit = new Produits;
        $produit->Produit_Nom=$request->Produit_Nom;
        $produit->Produit_Ref=$request->Produit_Ref;
        $produit->Produit_Cath=$cathegories->id;
        $produit->Produit_Description=$request->Produit_Description;
        $produit->save();
        return redirect("/produits");
    }

    public function edit($id)
    {
        $produits = Produits::where('id',$id)->first();
        $Cathegories = Cathegories::all();
        return view('produits.edit',compact('produits', 'Cathegories'))->with([
            'produits'=>$produits
        ]);
    }
    public function update(Request $request,$id){
        $cathegories = Cathegories::where('id',$id)->first();
        if($request->Nouvelle_Cathegorie) {
            $cathegories->Cath_Designation = $request->Nouvelle_Cathegorie;
        } else {
            $cathegories->Cath_Designation = $request->Produit_Cath;
        }
        $cathegories->Cath_Nom = $request->Cath_Nom;
        $cathegories->save();

        $produits = Produits::where('id',$id)->first();
        $produits->update([
            'Produit_Nom'=>$request->Produit_Nom,
            'Produit_Ref'=>$request->Produit_Ref,
            'Produit_Cath'=>$cathegories->id,
            'Produit_Description'=>$request->Produit_Description,
        ]);

        $produits=Produits::get();
        return redirect()->route('produits',compact('produits'))->with(([
            'success' => 'produits modifié'
        ]));
    }


    public function delete($id){
        $produit = Produits::find($id);
        if (!$produit) {
            return redirect()->route('produits')->with(([
                'error' => 'produit non trouvé'
            ]));
        }

        $cathegorie = Cathegories::find($produit->Produit_Cath);
        if ($cathegorie) {
            $cathegorie->delete();
        }

        $produit->delete();

        return redirect()->route('produits')->with(([
            'success' => 'produit supprimé'
        ]));
    }

}

