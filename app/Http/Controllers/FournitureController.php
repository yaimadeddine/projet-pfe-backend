<?php

namespace App\Http\Controllers;

use App\Models\Fourniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournitureController extends Controller
{
    public function store(Request $request)
    {
        $materiel = new Fourniture();
        $materiel->matricule = $request->input('matricule');
        $materiel->prix = $request->input('prix');
        $materiel->type_fourniture_id = $request->input('type_fourniture_id');
        $materiel->materiel_id = $request->input('materiel_id');
        $materiel->contrat_id = $request->input('contrat_id');
        $materiel->marque_id = $request->input('marque_id');
        $materiel->save();

        return response()->json([
            'status' => 200,
            'message' => 'Materiel créé avec succès',
        ]);
    }


    public function findAll(Request $request)
    {
        $materiels = DB::table('fourniture')
            ->join(
                'type_fourniture',
                'type_fourniture.id',
                '=',
                'fourniture.type_fourniture_id'
            )
            ->join(
                'contrat',
                'contrat.id',
                '=',
                'fourniture.contrat_id'
            )
            ->join(
                'marque',
                'marque.id',
                '=',
                'fourniture.marque_id'
            )
            ->leftJoin(
                'materiel',
                'materiel.id',
                '=',
                'fourniture.materiel_id'
            )

            ->select(
                'fourniture.id',
                'fourniture.matricule',
                'fourniture.prix',
                'fourniture.type_fourniture_id',
                'fourniture.contrat_id',
                'fourniture.marque_id',
                'fourniture.materiel_id',
                'type_fourniture.name as type_fourniture_name',
                'contrat.matricule as contrat_matricule',
                'marque.name as marque_name',
                'materiel.matricule as materiel_matricule',
            )->get();


        return response()->json($materiels);
    }

    public function update(Request $request, $id)
    {
        Fourniture::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }

    public function delete($id)
    {
        Fourniture::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }

    public function findCount()
    {
        $salle = Fourniture::count();
        return response()->json($salle);
    }
}
