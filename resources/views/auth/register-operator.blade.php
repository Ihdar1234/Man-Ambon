@extends('backend.dashboard')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#0B1E3B] via-[#0F3C5E] to-[#2C5364] px-4 py-20 relative overflow-hidden">

    {{-- GRADIENT PATTERN --}}
    <div class="absolute inset-0 bg-[url('/images/pattern-islamic.svg')] opacity-10"></div>

    {{-- CARD FORM --}}
    <div class="relative w-full max-w-md bg-white/10 backdrop-blur-3xl border border-white/20 shadow-2xl rounded-3xl p-8 animate-slideUp z-10">

        {{-- HEADER --}}
        <div class="text-center mb-6">
            <div class="relative flex justify-center">
                <div class="bg-gradient-to-tr from-yellow-400 to-emerald-400 p-[3px] rounded-full shadow-[0_0_25px_rgba(255,255,255,0.5)]">
                    <img src="{{ asset('storage/image/sejarah.jpg') }}" alt="Logo MAN Ambon" class="w-24 h-24 md:w-28 md:h-28 rounded-full bg-white shadow-xl animate-float">
                </div>
            </div>

            <h1 class="mt-4 text-3xl md:text-4xl font-extrabold bg-gradient-to-r from-yellow-400 via-emerald-300 to-green-500 bg-clip-text text-transparent drop-shadow-lg tracking-wide">
                Portal MAN Ambon
            </h1>
            <p class="text-emerald-100 text-sm md:text-base mt-1 opacity-80">Sistem Layanan dan Informasi Digital</p>
        </div>

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="alert alert-error mb-4 rounded-lg shadow-lg text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <form action="{{ route('register.operator.post') }}" method="POST" class="space-y-4 relative">
            @csrf

            {{-- Nama Lengkap --}}
            <div class="form-control">
                <label class="label font-semibold text-sm text-emerald-100">Nama Lengkap</label>
                <div class="relative flex items-center">
                    <span class="absolute left-4 text-emerald-400 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A6 6 0 0112 15a6 6 0 016.879 2.804M12 11a4 4 0 100-8 4 4 0 000 8z"/>
                        </svg>
                    </span>
                    <input type="text" name="name" placeholder="Masukkan nama lengkap"
                        class="input input-bordered w-full h-12 pl-12 rounded-xl bg-white/20 text-white placeholder-gray-200 border-none focus:ring-2 focus:ring-yellow-400 focus:outline-none transition-all duration-300"
                        required>
                </div>
            </div>

            {{-- Email --}}
            <div class="form-control">
                <label class="label font-semibold text-sm text-emerald-100">Email</label>
                <div class="relative flex items-center">
                    <span class="absolute left-4 text-emerald-400 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m0 0l8-6m-8 6l8 6"/>
                        </svg>
                    </span>
                    <input type="email" name="email" placeholder="contoh@email.com"
                        class="input input-bordered w-full h-12 pl-12 rounded-xl bg-white/20 text-white placeholder-gray-200 border-none focus:ring-2 focus:ring-yellow-400 focus:outline-none transition-all duration-300"
                        required>
                </div>
            </div>

            {{-- Password --}}
            <div class="form-control">
                <label class="label font-semibold text-sm text-emerald-100">Password</label>
                <div class="relative flex items-center">
                    <span class="absolute left-4 text-emerald-400 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0-1.657 1.343-3 3-3s3 1.343 3 3v2H9v-2c0-1.657 1.343-3 3-3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 11h14v10H5z" />
                        </svg>
                    </span>
                    <input type="password" name="password" placeholder="Masukkan password"
                        class="input input-bordered w-full h-12 pl-12 rounded-xl bg-white/20 text-white placeholder-gray-200 border-none focus:ring-2 focus:ring-yellow-400 focus:outline-none transition-all duration-300"
                        required>
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div class="form-control">
                <label class="label font-semibold text-sm text-emerald-100">Konfirmasi Password</label>
                <div class="relative flex items-center">
                    <span class="absolute left-4 text-emerald-400 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11V7a3 3 0 10-6 0v4H5v10h14V11h-4z"/>
                        </svg>
                    </span>
                    <input type="password" name="password_confirmation" placeholder="Ulangi password"
                        class="input input-bordered w-full h-12 pl-12 rounded-xl bg-white/20 text-white placeholder-gray-200 border-none focus:ring-2 focus:ring-yellow-400 focus:outline-none transition-all duration-300"
                        required>
                </div>
            </div>

            {{-- Role --}}
            <div class="form-control">
                <label class="label font-semibold text-sm text-emerald-100">Pilih Role</label>
                <div class="relative flex items-center">
                    <span class="absolute left-4 text-emerald-400 text-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2 0 4-2 4-4s-2-4-4-4-4 2-4 4 2 4 4 4zM6 20v-2c0-2.667 5.333-4 6-4s6 1.333 6 4v2H6z"/>
                        </svg>
                    </span>
                    <select name="role"
                        class="select select-bordered w-full h-12 pl-12 rounded-xl bg-white/20 text-white border-none focus:ring-2 focus:ring-yellow-400 focus:outline-none transition-all duration-300"
                        required>
                        <option disabled selected>Pilih salah satu</option>
                        <option value="operator" class="text-gray-900">Operator</option>
                        <option value="tu" class="text-gray-900">TU</option>
                    </select>
                </div>
            </div>

            {{-- Tombol Daftar --}}
            <button type="submit" class="btn w-full h-12 rounded-xl bg-gradient-to-r from-yellow-400 via-emerald-400 to-green-500 border-none text-white font-bold hover:scale-[1.03] hover:brightness-110 transition-all duration-300 shadow-lg mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v6M12 9v6M6 9v6M12 3v6m-4 0h8"/>
                </svg>
                Daftar Sekarang
            </button>
        </form>

        {{-- Footer --}}
        <div class="text-center mt-6">
            <p class="text-emerald-100 text-sm">Sudah punya akun?</p>
            <a href="{{ route('login.operator.login-operator') }}" class="text-yellow-300 font-semibold hover:text-white transition-all duration-200">
                Kembali ke Login
            </a>
        </div>
    </div>
</div>

{{-- ANIMASI --}}
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-slideUp { animation: fadeIn 0.8s ease-in-out forwards; }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-6px); }
    }
    .animate-float { animation: float 3s ease-in-out infinite; }
</style>
@endsection
