<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Get all tokos.
     */
    public function index()
    {
        $tokos = Toko::with('user')->get();
        return response()->json(['data' => $tokos], 200);
    }

    /**
     * Store a new toko.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id'
        ]);

        $toko = Toko::create($request->all());

        return response()->json([
            'message' => 'Toko berhasil ditambahkan!',
            'data' => $toko
        ], 201);
    }

    /**
     * Get a specific toko by ID.
     */
    public function show($id)
    {
        $toko = Toko::with('user')->find($id);

        if (!$toko) {
            return response()->json(['message' => 'Toko tidak ditemukan'], 404);
        }

        return response()->json(['data' => $toko], 200);
    }

    /**
     * Update a toko.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id'
        ]);

        $toko = Toko::find($id);

        if (!$toko) {
            return response()->json(['message' => 'Toko tidak ditemukan'], 404);
        }

        $toko->update($request->all());

        return response()->json([
            'message' => 'Toko berhasil diperbarui!',
            'data' => $toko
        ], 200);
    }

    /**
     * Delete a toko.
     */
    public function destroy($id)
    {
        $toko = Toko::find($id);

        if (!$toko) {
            return response()->json(['message' => 'Toko tidak ditemukan'], 404);
        }

        $toko->delete();

        return response()->json(['message' => 'Toko berhasil dihapus'], 200);
    }
}
