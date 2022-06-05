<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class MarqueController extends Controller
{
    public function store(Request $request)
    {
        $marque = new Marque;
        $marque->name = $request->input('name');
        $marque->libelle = $request->input('libelle');
        $marque->save();

        return response()->json([
            'status' => 200,
            'message' => 'Marque créé avec succès',
        ]);
    }


    public function findAll(Request $request)
    {
        try {
            $marque = Marque::all();
            return response()->json($marque);
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

    public function update(Request $request, $id)
    {
        Marque::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }

    public function delete($id)
    {
        Marque::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }

    public function findCount()
    {
        $marque = Marque::count();
        return response()->json($marque);
    }
}
