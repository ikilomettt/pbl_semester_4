<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::with('pesanan')->get();
        return response()->json($pembayaran);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'tanggal_pembayaran' => 'required|date',
            'metode_pembayaran' => 'required|string',
            'jumlah_pembayaran' => 'required|numeric',
            'bukti_pembayaran' => 'required|string'
        ]);

        $pembayaran = Pembayaran::create($request->all());

        return response()->created($pembayaran);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pembayaran = Pembayaran::with('pesanan')->find($id);
        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran not found'], 404);
        }

        return response()->json($pembayaran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembayaran = Pembayaran::find($id);
        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran not found'], 404);
        }

        $request->validate([
            'pesanan_id' => 'required|exists:pesanans,id',
            'tanggal_pembayaran' => 'required|date',
            'metode_pembayaran' => 'required|string',
            'jumlah_pembayaran' => 'required|numeric',
            'bukti_pembayaran' => 'required|string'
        ]);

        $pembayaran->update($request->all());

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::find($id);
        if (!$pembayaran) {
            return response()->json(['message' => 'Pembayaran not found'], 404);
        }

        $pembayaran->delete();

        return response()->noContent();
    }
}
