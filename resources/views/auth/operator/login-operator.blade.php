@extends('backend.dashboard')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center 
            bg-gradient-to-br from-[#0B1E3B] via-[#0F3C5E] to-[#2C5364] 
            px-4 pt-28 pb-40">

    {{-- SESSION ERROR --}}
    @if(session('error'))
    <div class="w-full max-w-lg mb-5">
        <div class="alert alert-error shadow-lg rounded-xl backdrop-blur-xl bg-red-500/20 text-red-100 border border-red-300/30">
            <span class="font-semibold">{{ session('error') }}</span>
        </div>
    </div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
    <div class="w-full max-w-lg mb-5">
        <div class="alert alert-error shadow-lg rounded-xl backdrop-blur-xl bg-red-500/20 text-red-100 border border-red-300/30">
            <ul class="list-disc px-5 space-y-1">
                @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    {{-- HEADER --}}
    <div class="text-center mb-8">
        <div class="relative flex justify-center">
            <div class="bg-gradient-to-tr from-purple-500 via-indigo-500 to-teal-400 p-[3px] rounded-full shadow-[0_0_25px_rgba(255,255,255,0.5)]">
                <img src="{{ asset('storage/image/sejarah.jpg') }}" alt="Logo MAN Ambon"
                     class="w-28 h-28 md:w-32 md:h-32 rounded-full bg-white shadow-xl animate-float">
            </div>
        </div>
        <h2 class="mt-5 text-4xl font-extrabold bg-gradient-to-r from-purple-300 via-indigo-300 to-teal-300 bg-clip-text text-transparent drop-shadow-xl tracking-wide">
            Login Operator/TU
        </h2>
        <p class="text-teal-100 text-sm mt-1 opacity-80">Silakan masuk untuk melanjutkan ke akun operator/TU</p>
    </div>

    {{-- CARD LOGIN --}}
    <div class="w-full max-w-lg bg-white/10 backdrop-blur-3xl border border-white/20 rounded-3xl shadow-2xl p-10 animate-slideUp">

        <h2 class="text-3xl font-bold text-center text-white mb-6 drop-shadow-lg">Login Akun</h2>

        <form action="{{ route('login.operator.post') }}" method="POST" class="space-y-6">
            @csrf

            {{-- EMAIL --}}
            <div class="form-control relative">
                <label class="label">
                    <span class="label-text text-indigo-100 font-semibold">Email</span>
                </label>
                <div class="relative">
                    <!-- Icon -->
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-cyan-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m0 0l8-6m-8 6l8 6" />
                        </svg>
                    </span>
                    <input type="email" name="email" placeholder="Masukkan email operator"
                           class="input input-bordered w-full h-12 pl-14 bg-white/20 text-white placeholder-gray-300 border border-white/30 
                           focus:outline-none focus:ring-2 focus:ring-cyan-300 rounded-xl transition-all shadow-inner"
                           required />
                </div>
            </div>

            {{-- PASSWORD --}}
            <div class="form-control relative">
                <label class="label">
                    <span class="label-text text-indigo-100 font-semibold">Password</span>
                </label>
                <div class="relative">
                    <!-- Icon -->
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-cyan-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0-1.657 1.343-3 3-3s3 1.343 3 3v2H9v-2c0-1.657 1.343-3 3-3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 11h14v10H5z" />
                        </svg>
                    </span>
                    <input type="password" name="password" placeholder="Masukkan password"
                           class="input input-bordered w-full h-12 pl-14 bg-white/20 text-white placeholder-gray-300 border border-white/30 
                           focus:outline-none focus:ring-2 focus:ring-cyan-300 rounded-xl transition-all shadow-inner"
                           required />
                </div>
            </div>

            {{-- BUTTON LOGIN --}}
            <button type="submit"
                    class="relative inline-flex items-center justify-center w-full h-12 overflow-hidden rounded-xl 
                    bg-gradient-to-r from-purple-500 via-indigo-500 to-teal-400 text-white font-semibold text-base shadow-lg 
                    transition-all duration-300 ease-out group hover:scale-[1.03] hover:shadow-indigo-400/50">

                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-purple-400/30 via-indigo-400/30 to-teal-300/30
                opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-md"></span>

                <span class="relative flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                    Masuk
                </span>
            </button>

            {{-- LINK REGISTER --}}
            <div class="mt-8 text-center text-sm text-indigo-100">
                <p class="mb-3 font-medium opacity-90">Belum punya akun?</p>
                <a href="{{ route('register.operator') }}"
                   class="px-5 py-2 rounded-full bg-white/20 hover:bg-purple-500/30 text-white font-semibold transition-all shadow-md backdrop-blur-xl">
                    Daftar Disini
                </a>
            </div>
        </form>
    </div>
</div>

{{-- ANIMASI --}}
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-float { animation: float 4s ease-in-out infinite; }
    .animate-slideUp { animation: slideUp 0.8s ease-out forwards; }
</style>
@endsection
