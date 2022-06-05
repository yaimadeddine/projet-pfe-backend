<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MaterielController extends Controller
{
    public function store(Request $request)
    {
        $materiel = new Materiel;
        $materiel->matricule = $request->input('matricule');
        $materiel->prix = $request->input('prix');
        $materiel->type_id = $request->input('type_id');
        $materiel->post_id = $request->input('post_id');
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
        $materiels = DB::table('materiel')
            ->join(
                'type',
                'type.id',
                '=',
                'materiel.type_id'
            )
            ->join(
                'post',
                'post.id',
                '=',
                'materiel.post_id'
            )
            ->join(
                'marque',
                'marque.id',
                '=',
                'materiel.marque_id'
            )
            ->leftJoin(
                'contrat',
                'contrat.id',
                '=',
                'materiel.contrat_id'
            )

            ->select(
                'materiel.id',
                'materiel.matricule',
                'materiel.prix',
                'materiel.type_id',
                'materiel.post_id',
                'materiel.contrat_id',
                'materiel.marque_id',
                'type.name as type_name',
                'post.matricule as post_matricule',
                'marque.name as marque_name',
                'contrat.matricule as contrat_matricule',
            )->get();


        return response()->json($materiels);
    }

    public function update(Request $request, $id)
    {
        Materiel::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }

    public function delete($id)
    {
        Materiel::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }

    public function findCount()
    {
        $salle = Materiel::count();
        return response()->json($salle);
    }
}
