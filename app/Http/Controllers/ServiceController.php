<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{

    public function store(Request $request)
    {
        $service = new Service;
        $service->name = $request->input('name');
        $service->matricule = $request->input('matricule');
        $service->save();

        return response()->json([
            'status' => 200,
            'message' => 'Service créé avec succès',
        ]);
    }

    public function findAll(Request $request)
    {
        try {
            $service = Service::all();
            return response()->json($service);
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }


    public function findCount()
    {
        $service = Service::count();
        return response()->json($service);
    }

    public function update(Request $request, $id)
    {
        Service::where('id', $id)->update($request->all());
        return response()->json([
            'status' => 200,
            'message' => 'updated succesfully',
        ]);
    }


    public function delete($id)
    {
        Service::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => 'Service deleted succesfully',
        ]);
    }
}
