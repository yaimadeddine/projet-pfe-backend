<?php

namespace App\Http\Controllers;



use App\Models\Contrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;

class ContratController extends Controller
{
    public function store(Request $request)
    {
        $contrat = new Contrat;
        $contrat->matricule = $request->input('matricule');
        $contrat->date = $request->input('date');
        $contrat->date_garantie = $request->input('date_garantie');
        $contrat->fournisseur_id = $request->input('fournisseur_id');
        $contrat->save();

        return response()->json([
            'status' => 200,
            'message' => 'Contrat créé avec succès',
        ]);
    }




    public function findAll(Request $request)
    {

       $contrats = DB::table('contrat')
       ->leftjoin(
           'fournisseur',
           'fournisseur.id',
           '=',
           'contrat.fournisseur_id'
       )->select(
           'contrat.id',
           'contrat.matricule',
           'contrat.date',
           'contrat.date_garantie',
           'contrat.fournisseur_id',
           'fournisseur.name as fournisseur_name'
       )->orderBy('date')
       ->get();




       return response()->json($contrats);
    }


    public function update(Request $request, $id)
    {
        Contrat::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }

    public function delete($id)
    {
        Contrat::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }

    public function findCount()
    {
        $salle = Contrat::count();
        return response()->json($salle);
    }

    public function findlist() {
        $contrat = Contrat::with('materiels')->get();
        return response()->json($contrat);
    }
}
