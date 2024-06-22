<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Concert;
use App\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->user_id, $request->concert_id, $request->concert_type);
        if ($request->user_id || $request->concert_id || $request->concert_type) {
            // build seats

            $seats  = Seat::filter([
                'user_id' => $request->user_id,
                'concert_id' => $request->concert_id,
                'seat_type' => $request->concert_type
            ])->get();

            return response()->json([
                'status' => 'success',
                'data' => $seats
            ], 200);
        } else {
            $seats = Seat::all();
            return response()->json([
                'status' => 'success',
                'data' => $seats
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Stoore the seat
        $validated = $request->validate([
            'concert_id' => 'required|integer',
            'seat_no' => 'required|string|max:255',
            'seat_type' => 'required|string|max:255',
            'user_id' => 'required|integer',
        ]);

        $validated = array_merge($validated, ['is_paid' => false]);

        $concert = Seat::create($validated);
        return response()->json($concert, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $concert = Seat::find($id);

        return response()->json($concert, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $validated = $request->validate([
            'concert_id' => 'required|integer',
            'seat_no' => 'required|string|max:255',
            'seat_type' => 'required|string|max:255',
            'user_id' => 'required|integer',
            'is_paid' => 'required|boolean',
        ]);

        $concert = Seat::find($id);

        $concert->update($validated);

        return response()->json($concert, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $concert = Seat::find($id);

        $concert->delete();
    }
}
