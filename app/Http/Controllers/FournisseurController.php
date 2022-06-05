<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class FournisseurController extends Controller
{
    public function store(Request $request)
    {
        $fournisseur = new Fournisseur;
        $fournisseur->name = $request->input('name');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->phone = $request->input('phone');
        $fournisseur->libelle = $request->input('libelle');
        $fournisseur->save();

        return response()->json([
            'status' => 200,
            'message' => 'Fournisseur créé avec succès',
        ]);
    }


    public function findAll(Request $request)
    {
        try {
            $fournisseur = Fournisseur::all();
            return response()->json($fournisseur);
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }


    public function delete($id)
    {
        Fournisseur::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }


    public function update(Request $request, $id)
    {
        Fournisseur::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }


    public function findCount()
    {
        $service = Fournisseur::count();
        return response()->json($service);
    }

}
