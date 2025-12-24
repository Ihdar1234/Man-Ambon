<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
     public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('artikel-content', 'public');
            return response()->json([
                'location' => asset('storage/' . $path)
            ]);
        }
        return response()->json(['error' => 'Upload gagal'], 400);
    }
}
