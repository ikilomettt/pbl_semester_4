<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::with('user','genteng')->get();
        return response()->json($pesanan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'genteng_id' => 'required|exists:gentengs,id',
            'tanggal_pesanan' => 'required|date',
            'total_pesanan' => 'nullable|numeric',
            'jumlah_genteng' => 'required|integer|min:1000',
            'status_pesanan' => 'nullable|in:sukses,belum',
        ]);

        $pesanan = Pesanan::create($request->all());

        return response()->created($pesanan);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pesanan = Pesanan::with('user','genteng')->find($id);
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan not found'], 404);
        }

        return response()->json($pesanan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan not found'], 404);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'genteng_id' => 'required|exists:gentengs,id',
            'tanggal_pesanan' => 'required|date',
            'total_pesanan' => 'nullable|numeric',
            'jumlah_genteng' => 'required|integer|min:1000',
            'status_pesanan' => 'nullable|in:sukses,belum',
        ]);

        $pesanan->update($request->all());

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan not found'], 404);
        }

        $pesanan->delete();

        return response()->noContent();
    }
}
