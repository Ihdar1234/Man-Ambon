<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 🔹 Tampilkan form login per role
    public function showAdminLogin()
    {
        return view('auth.admin.login-admin');
    }

    public function showSiswaLogin()
    {
        return view('auth.siswa.login-siswa');
    }

    public function showMasyarakatLogin()
    {
        return view('auth.masyarakat.login-masyarakat');
    }

    public function showOperatorLogin()
    {
        return view('auth.operator.login-operator');
    }

    // ======== PROSES LOGIN ========
    
    public function loginAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && Auth::user()->role === 'admin') {
            return redirect()->intended('/backend');
        }
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function loginSiswa(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && Auth::user()->role === 'siswa') {
            return redirect()->intended('/siswa/layouts');
        }
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function loginMasyarakat(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && Auth::user()->role === 'masyarakat') {
            return redirect()->intended('/masyarakat/dashboard');
        }
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function loginOperator(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && in_array(Auth::user()->role, ['operator', 'tu'])) {
            return redirect()->intended('/dashboard/operator/home');
        }
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // ======== LOGOUT SPESIFIK PER ROLE ========
    public function logout(Request $request)
    {
        $role = Auth::user()->role ?? null;

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        switch ($role) {
            case 'admin':
                return redirect()->route('login.admin.login-admin')->with('success', 'Anda telah logout.');
            case 'siswa':
                return redirect()->route('login.siswa.login-siswa')->with('success', 'Anda telah logout.');
            case 'operator':
            case 'tu':
                return redirect()->route('login.operator.login-operator')->with('success', 'Anda telah logout.');
            case 'masyarakat':
                return redirect()->route('login.masyarakat')->with('success', 'Anda telah logout.');
            default:
                return redirect('/')->with('success', 'Anda telah logout.');
        }
    }

    // ======== REGISTRASI ========

    public function showOperatorRegister()
    {
        return view('auth.register-operator');
    }

    public function registerOperator(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:operator,tu',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('login.operator.login-operator')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function showSiswaRegister()
    {
        return view('auth.register-siswa');
    }

    public function registerSiswa(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'siswa';

        User::create($data);

        return redirect()->route('login.siswa.login-siswa')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function showMasyarakatRegister()
    {
        return view('auth.register-masyarakat');
    }

    public function registerMasyarakat(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'masyarakat';

        User::create($data);

        return redirect()->route('login.masyarakat')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
