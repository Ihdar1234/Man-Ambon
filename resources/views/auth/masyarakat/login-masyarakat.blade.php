@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-[#0F2027] via-[#203A43] to-[#2C5364] px-4 pt-28 pb-40">

  {{-- HEADER --}}
  <div class="text-center mb-8">
    <div class="relative flex justify-center">
      <div class="bg-gradient-to-tr from-yellow-400 to-emerald-400 p-[3px] rounded-full">
        <img src="{{ asset('storage/image/sejarah.jpg') }}" alt="Logo MAN Ambon"
          class="w-28 h-28 md:w-32 md:h-32 rounded-full bg-white shadow-lg animate-float">
      </div>
    </div>
    <h2 class="mt-5 text-4xl font-extrabold bg-gradient-to-r from-yellow-400 via-emerald-300 to-green-500 bg-clip-text text-transparent drop-shadow-lg tracking-wide">
      Login
    </h2>
    <p class="text-emerald-100 text-sm mt-1">Silakan masuk untuk melanjutkan ke akun Masyarakat</p>
  </div>

  {{-- CARD LOGIN --}}
  <div class="w-full max-w-lg bg-white/10 backdrop-blur-2xl border border-white/20 rounded-3xl shadow-2xl p-10 animate-slideUp mb-10">
    <h2 class="text-3xl font-bold text-center text-white mb-6">Login Akun</h2>

    <form action="{{ route('login.masyarakat.post') }}" method="POST" class="space-y-6">
      @csrf

      {{-- EMAIL --}}
      <div class="form-control">
        <label class="label">
          <span class="label-text text-indigo-100 font-semibold">Email</span>
        </label>
        <div class="relative">
          {{-- ICON EMAIL --}}
          <span class="absolute left-4 top-1/2 -translate-y-1/2 text-cyan-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 12H8m8 0V8a4 4 0 10-8 0v4m-4 4h16v2H4z" />
            </svg>
          </span>
          <input type="email" name="email" placeholder="Masukkan email siswa"
            class="input input-bordered w-full h-12 pl-12 bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-cyan-300 rounded-xl transition-all"
            required />
        </div>
      </div>

      {{-- PASSWORD --}}
      <div class="form-control">
        <label class="label">
          <span class="label-text text-indigo-100 font-semibold">Password</span>
        </label>
        <div class="relative">
          {{-- ICON LOCK --}}
          <span class="absolute left-4 top-1/2 -translate-y-1/2 text-cyan-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 11c1.657 0 3 1.343 3 3v2H9v-2c0-1.657 1.343-3 3-3zm6-3a6 6 0 10-12 0v3H6a2 2 0 00-2 2v7h16v-7a2 2 0 00-2-2h-1V8z" />
            </svg>
          </span>
          <input type="password" name="password" placeholder="Masukkan password"
            class="input input-bordered w-full h-12 pl-12 bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-cyan-300 rounded-xl transition-all"
            required />
        </div>
      </div>

      {{-- BUTTON LOGIN --}}
     <button type="submit"
  class="relative inline-flex items-center justify-center w-full h-12 overflow-hidden rounded-xl bg-gradient-to-r from-cyan-400 via-blue-500 to-indigo-500 text-white font-semibold text-base shadow-lg transition-all duration-300 ease-out group hover:scale-[1.02] hover:shadow-cyan-400/40">

  {{-- Glow overlay --}}
  <span
    class="absolute inset-0 w-full h-full bg-gradient-to-r from-cyan-300/30 to-blue-400/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur-md"></span>

  {{-- Icon + Text --}}
  <span class="relative flex items-center justify-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
      fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M5 12h14M12 5l7 7-7 7" />
    </svg>
    Masuk
  </span>
</button>


    {{-- REGISTER LINK --}}
    <div class="mt-8 text-center text-sm text-indigo-100">
      <p class="mb-3 font-medium">Belum punya akun?</p>
      <a href="{{ route('register.masyarakat') }}"
        class="px-5 py-2 rounded-full bg-white/20 hover:bg-cyan-400/30 text-white font-semibold transition-all">
        Daftar Disini
      </a>
    </div>
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
