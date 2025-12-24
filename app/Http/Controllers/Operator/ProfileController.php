<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserAvatar;

class ProfileController extends Controller
{
    // Menampilkan form profil
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.operator.profile', compact('user'));
    }

    // Update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
            'avatar' => 'nullable',
        ]);

        // Update nama & email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password jika diisi
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // simpan user dulu

        // === AVATAR BASE64 ===
        if ($request->avatar) {

            $img = $request->avatar;

            // Hapus prefix Base64
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);

            // Nama file unik
            $fileName = 'avatar_' . time() . '.png';
            $path = public_path('storage/avatars/' . $fileName);

            // Simpan file di storage
            file_put_contents($path, base64_decode($img));

            // Simpan ke tabel user_avatars
            // Jika user sudah punya avatar, update path
            if ($user->avatar) {
                $user->avatar->path = 'storage/avatars/' . $fileName;
                $user->avatar->save();
            } else {
                UserAvatar::create([
                    'user_id' => $user->id,
                    'path' => 'storage/avatars/' . $fileName,
                ]);
            }
        }

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
