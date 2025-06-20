<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;

class GambarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:1024',
            'kategori' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName(); 
            $folderPath = public_path('gambar'); 

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $file->move($folderPath, $filename);
        }

        $gambar = Gambar::create([
            'gambar' => $filename,
            'kategori' => $request->kategori,
        ]);

        return response()->json([
            'message' => 'Gambar berhasil disimpan',
            'data' => $gambar
        ], 201);
    }

    public function fetchAll()
    {
        try {
            $gambars = Gambar::get();
            
            return response()->json([
                'success' => true,
                'data' => $gambars
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data artikel terbit'
            ], 500);
        }
    }
}

