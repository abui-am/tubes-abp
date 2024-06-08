<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    // Display a listing of concerts
    public function index()
    {
        return response()->json(Concert::all());
    }

    // Store a newly created concert in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artists' => 'required|string|max:255',
            'date' => 'required|date',
            'city' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'venue_address' => 'required|string|max:255',
            'ticket_price_in_rupiah' => 'required|integer',
            'videoURL' => 'required|url',
            'imageURL' => 'required|url',
            'additional_information' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $concert = Concert::create($validated);
        return response()->json($concert, 201);
    }
    // Display the specified concert
    public function show($id)
    {
        $concert = Concert::find($id);

        if (!$concert) {
            return response()->json(['message' => 'Concert not found'], 404);
        }

        return response()->json($concert);
    }

    // Update the specified concert in storage

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artists' => 'required|string|max:255',
            'date' => 'required|date',
            'city' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'venue_address' => 'required|string|max:255',
            'ticket_price_in_rupiah' => 'required|integer',
            'videoURL' => 'required|url',
            'imageURL' => 'required|url',
            'additional_information' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $concert = Concert::find($id);

        if (!$concert) {
            return response()->json(['message' => 'Concert not found'], 404);
        }

        $concert->fill($validated);
        $concert->save();

        return response()->json($concert);
    }

    // Remove the specified concert from storage
    public function destroy($id)
    {
        $concert = Concert::find($id);

        if (!$concert) {
            return response()->json(['message' => 'Concert not found'], 404);
        }

        $concert->delete();
        return response()->json(['message' => 'Concert deleted successfully']);
    }
}
