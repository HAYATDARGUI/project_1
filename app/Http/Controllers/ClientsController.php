<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Villes;
use App\Models\Zones;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
     $clients=Clients::get();
     return view("clients.index",compact('clients'));
    }

    public function create()
    {
    return view("clients.create");
    }

    public function store(Request $request)
    {

        //traitement d'ajout
            $zone=new Zones();
            $zone->Zone_Nom=$request->Ville_Zone;
            $zone->save();

            $ville=new Villes();
            $ville->Ville_Nom=$request->Client_Ville;
            $ville->Ville_Zone=$zone->id;
            $ville->save();

            $client = new Clients;
            $client->Client_Principale=$request->Client_Principale;
            $client->Client_Societe=$request->Client_Societe;
            $client->Client_Ville = $ville->id;
            $client->Client_Tel=$request->Client_Tel;
            $client->Client_Emails=$request->Client_Emails;
            $client->Client_Note=$request->Client_Note;
            $client->save();
            return redirect("/clients");
    }

    public function modification($id)
    {
        $clients = Clients::where('id',$id)->first();
        return view('clients.modifier')->with([
            'clients'=>$clients
        ]);
    }
    public function update(Request $request,$id){
        $zones = Zones::where('id',$id)->first();
        $zones->update([
            'Zone_Nom'=>$request->Ville_Zone,
        ]);

        $villes = Villes::where('id',$id)->first();
        $villes->update([
            'Ville_Nom'=>$request->Client_Ville,
            'Ville_Zone'=>$zones->id,
        ]);

        $clients = Clients::where('id',$id)->first();
        $clients->update([
            'Client_Principale'=>$request->Client_Principale,
            'Client_Societe'=>$request->Client_Societe,
            'Client_Ville'=>$villes->id,
            'Client_Tel'=>$request->Client_Tel,
            'Client_Emails'=>$request->Client_Emails,
            'Client_Note'=>$request->Client_Note,
        ]);

        $clients=Clients::get();
        return redirect()->route('clients',compact('clients'))->with(([
            'success' => 'clients modifié'
        ]));
    }
    public function delete($id){
        $client = Clients::find($id);
        if (!$client) {
            return redirect()->back()->with(['error' => 'Client introuvable']);
        }

        $ville = $client->villes;
        if ($ville) {
            $zone = $ville->zones;
            if ($zone) {
                $zone->delete();
            }
            $ville->delete(); // supprimer l'enregistrement correspondant dans la table "villes"
        }

        $client->delete(); // supprimer l'enregistrement dans la table "clients"

        return redirect()->route('clients')->with(['success' => 'Client supprimé avec succès']);
    }

}
