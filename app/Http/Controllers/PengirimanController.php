<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengiriman = Pengiriman::with('pesanan')->get();
        return response()->json($pengiriman);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'tanggal_pesanan' => 'required|date',
            'alamat' => 'required|string',
        ]);

        $pengiriman = Pengiriman::create($request->all());

        return response()->created($pengiriman);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengiriman = Pengiriman::with('pesanan')->find($id);
        if (!$pengiriman) {
            return response()->json(['message' => 'Pengiriman not found'], 404);
        }

        return response()->json($pengiriman);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengiriman = Pengiriman::find($id);
        if (!$pengiriman) {
            return response()->json(['message' => 'Pengiriman not found'], 404);
        }

        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'tanggal_pesanan' => 'required|date',
            'alamat' => 'required|string',
        ]);

        $pengiriman->update($request->all());

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengiriman = Pengiriman::find($id);
        if (!$pengiriman) {
            return response()->json(['message' => 'Pengiriman not found'], 404);
        }

        $pengiriman->delete();

        return response()->noContent();
    }
}
