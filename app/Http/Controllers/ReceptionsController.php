<?php

namespace App\Http\Controllers;

use App\Models\BonReception;
use App\Models\Clients;
use App\Models\Detail_Br;
use App\Models\Produit_Etat_Reparation;
use App\Models\Produits;
use App\Models\Transports;
use App\Models\Villes;
use App\Models\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceptionsController extends Controller
{
    public function index()
    {
     $Detail_Br=Detail_Br::get();
     $receptions=BonReception::get();
     return view("receptions.index",compact('receptions','Detail_Br'));
    }
    public function create()
    {
    $clients = Clients::all();
    $produits = Produits::all();
    return view("receptions.create", compact('clients','produits'));
    }

    public function store(Request $request)
    {
            $produit_Etat_R = new Produit_Etat_Reparation();
            $produit_Etat_R->EtatReparation_Ref=$request->dBR_Etat_Reparation;
            $produit_Etat_R->save();


            $transport = Transports::where('Transport_Nom', $request->BR_Transporte)->first();
            if (!$transport){
                $transport = new Transports();
                $transport->Transport_Nom=$request->BR_Transporte;
                $transport->save();
            }

            $client = Clients::where('Client_Principale', $request->BR_Client)->first();
            if (!$client) {
                // Si le client n'existe pas, créer un nouveau client
                $zone = new Zones();
                $zone->Zone_Nom = $request->Ville_Zone;
                $zone->save();

                $ville = new Villes();
                $ville->Ville_Nom = $request->Client_Ville;
                $ville->Ville_Zone = $zone->id;
                $ville->save();

                $client = new Clients();
                $client->Client_Principale = $request->BR_Client;
                $client->Client_Societe = $request->Client_Societe;
                $client->Client_Ville = $ville->id;
                $client->save();
            }

            $bonreception = new BonReception();
            $bonreception->BR_Date=$request->BR_Date;
            $bonreception->BR_Client = $client->id;
            $bonreception->BR_Qte=$request->BR_Qte;
            $bonreception->BR_Transporte=$transport->id;
            $bonreception->BR_Note=$request->BR_Note;
            $bonreception->BR_NoDocument=$request->BR_NoDocument;
            $bonreception->save();


            // Récupération du produit à partir du nom
            $produit = Produits::where('Produit_Nom', $request->dBR_Produit)->first();

            // Si le produit n'existe pas, on ajoute un message d'erreur
            if (!$produit){
                $produit = new Produits();
                $produit->Produit_Nom=$request->dBR_Produit;
                $produit->save();
                return redirect()->back()->withInput()->withErrors(['dBR_Produit' => 'Le produit sélectionné n\'existe pas']);
            }
            // Le produit existe, on crée le détail BR
            $detail_br = new Detail_Br();
            $detail_br->dBR_BR=$bonreception->id;
            $detail_br->dBR_Produit=$produit->id;
            $detail_br->dBR_SN=$request->dBR_SN;
            $detail_br->dBR_Etat_Reparation=$produit_Etat_R->id;
            $detail_br->dBR_Garantie=$request->dBR_Garantie;
            $detail_br->dBR_Accessoires=$request->dBR_Accessoires;
            $detail_br->save();

            return redirect("/receptions");
        }
        public function edition($id)
{
    $bonreception = BonReception::find($id);
    $detail_br = Detail_Br::where('dBR_BR', $id)->first();
    $clients = Clients::all();
    $produits = Produits::all();

    return view("receptions.edition", compact('bonreception', 'detail_br', 'clients', 'produits'));
}



public function update(Request $request, $id)
{
    dd($request);
    // Validate the request data
    $validatedData = $request->validate([
        'BR_Date' => 'required|date',
        'BR_Client' => 'required',
        'BR_Qte' => 'required|numeric',
        'BR_Transporte' => 'required',
        'BR_Note' => 'nullable',
        'BR_NoDocument' => 'nullable',
        'dBR_Produit' => 'required',
        'dBR_SN' => 'required',
        'dBR_Garantie' => 'required|boolean',
        'dBR_Accessoires' => 'nullable',
        'dBR_Etat_Reparation' => 'required',
    ]);

    // Find the bon reception to be updated
    $bonreception = BonReception::findOrFail($id);

    // Update the bon reception with the validated data
    $bonreception->BR_Date = $validatedData['BR_Date'];
    $bonreception->BR_Qte = $validatedData['BR_Qte'];
    $bonreception->BR_Note = $validatedData['BR_Note'];
    $bonreception->BR_NoDocument = $validatedData['BR_NoDocument'];
    $bonreception->BR_Client = $validatedData['BR_Client'];
    $bonreception->BR_Transporte = $validatedData['BR_Transporte'];
    $bonreception->save();

    // Update the associated detail BR record
    $detail_br = Detail_Br::where('dBR_BR', $id)->firstOrFail();
    $detail_br->dBR_Produit = $validatedData['dBR_Produit'];
    $detail_br->dBR_SN = $validatedData['dBR_SN'];
    $detail_br->dBR_Etat_Reparation = $validatedData['dBR_Etat_Reparation'];
    $detail_br->dBR_Garantie = $validatedData['dBR_Garantie'];
    $detail_br->dBR_Accessoires = $validatedData['dBR_Accessoires'];
    $detail_br->save();
    $transport = Transports::where('Transport_Nom', $id)->firstOrFail();
    $transport->Transport_Nom= $validatedData['Transport_Nom'];
    $transport->save();

// Redirect the user to the list of bon receptions with a success message
return redirect('/receptions')->with('success', 'Le bon de réception a été mis à jour avec succès.');
}






}