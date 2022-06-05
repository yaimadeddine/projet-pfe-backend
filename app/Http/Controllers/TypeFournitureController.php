<?php

namespace App\Http\Controllers;

use App\Models\TypeFourniture;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TypeFournitureController extends Controller
{
    public function store(Request $request)
    {
        $type = new TypeFourniture;
        $type->name = $request->input('name');
        $type->save();

        return response()->json([
            'status' => 200,
            'message' => 'typefourniture créé avec succès',
        ]);
    }

    public function findAll(Request $request)
    {
        try {
            $type = TypeFourniture::all();
            return response()->json($type);
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }

    public function update(Request $request, $id)
    {
        TypeFourniture::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }

    public function delete($id)
    {
        TypeFourniture::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }

    public function findCount()
    {
        $salle = TypeFourniture::count();
        return response()->json($salle);
    }
}
