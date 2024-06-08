<?php

namespace App\Http\Controllers;

use App\Models\Genteng;
use Illuminate\Http\Request;

class GentengController extends Controller
{

    public function index()
    {
        $genteng = Genteng::all();
        return response()->json($genteng);

    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar_genteng' => 'required|string',
            'nama_genteng' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $genteng = Genteng::create($request->all());

        return response()->created($genteng);
    }

    public function show(string $id)
    {
        $genteng = Genteng::find($id);
        if (!$genteng) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($genteng);
    }

    public function update(Request $request, string $id)
    {
        $genteng = Genteng::find($id);
        if (!$genteng) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $request->validate([
            'gambar_genteng' => 'required|string',
            'nama_genteng' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $genteng->update($request->all());

        return response()->noContent();
    }
    
    public function destroy(string $id)
    {
        $genteng = Genteng::find($id);
        if (!$genteng) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $genteng->delete();

        return response()->noContent();
    }
}
