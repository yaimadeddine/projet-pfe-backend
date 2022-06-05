<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class TypeController extends Controller
{
    public function store(Request $request)
    {
        $type = new Type;
        $type->name = $request->input('name');
        $type->libelle = $request->input('libelle');
        $type->save();

        return response()->json([
            'status' => 200,
            'message' => 'type créé avec succès',
        ]);
    }

    public function findAll(Request $request)
    {
        try {
            $type = Type::all();
            return response()->json($type);
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

    public function update(Request $request, $id)
    {
        Type::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }

    public function delete($id)
    {
        Type::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }

    public function findCount()
    {
        $salle = Type::count();
        return response()->json($salle);
    }
}
