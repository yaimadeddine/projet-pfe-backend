<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $ticket = new Ticket;
        $ticket->status = $request->input('status'); // en attente / en cours / cloturer
        $ticket->commentaire = $request->input('commentaire');
        $ticket->material_id = $request->input('material_id');
        $ticket->tech_id = $request->input('tech_id');
        $ticket->date_fin = $request->input('date_fin');
        $ticket->save();

        return response()->json([
            'status' => 200,
            'message' => 'ticket créé avec succès',
        ]);
    }
    public function update(Request $request, $id)
{
    $ticket =Ticket::find($id);
    $ticket->status = $request->input('status');
    $ticket->save();
    return response()->json([
        'status' => 200,
        'message' => 'updated succesfully',
    ]);
}

    public function findAll(Request $request)
    {
        try {
            $ticket = Ticket::all();
            return response()->json($ticket);
        } catch (Exception $exception) {
            Log::error($exception);
        }
    }


    public function findCount()
    {
        $service = Ticket::count();
        return response()->json($service);
    }
}
