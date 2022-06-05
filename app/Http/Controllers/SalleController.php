<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalleController extends Controller
{
    public function store(Request $request)
    {
        $salle = new Salle;
        $salle->numero = $request->input('numero');
        $salle->service_id = $request->input('service_id');
        $salle->save();

        return response()->json([
            'status' => 200,
            'message' => 'Salle créé avec succès',
        ]);
    }

    // public function findAll(Request $request)
    // {
    //     try {
    //         $salle = Salle::all();
    //         return response()->json($salle);
    //     } catch (Exception $exception) {
    //         Log::error($exception);
    //     }
    // }

    // public function service()
    // {
    //     $salles = Salle::all();

    //     $array = [];

    //     foreach ($salles as $salle) {
    //         $salleId = $salle->id;
    //         $service = Salle::find($salleId)->service->name;
    //         array_push($array, $service);
    //     }
    //     return response()->json($array);
    // }
    public function findAll ()
    {
        $salles = DB::table('salle')->leftJoin(
            'service',
            'service.id',
            '=',
            'salle.service_id'
        )->select(
            'salle.id',
            'salle.numero',
            'salle.service_id',
            'service.name as service_name',
        )->orderBy('salle.numero')->get();

        return response()->json($salles);
    }

    public function update(Request $request, $id)
    {
        Salle::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }

    public function delete($id)
    {
        Salle::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }

    public function findCount()
    {
        $salle = Salle::count();
        return response()->json($salle);
    }
}
