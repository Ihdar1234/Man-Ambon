@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-start justify-center bg-gradient-to-br from-emerald-900 via-green-800 to-lime-700 px-4 relative overflow-hidden py-20">

  {{-- Background pola --}}
  <div class="absolute inset-0 bg-[url('/images/pattern-islamic.svg')] opacity-10"></div>

  {{-- Kartu form --}}
  <div class="relative w-full max-w-md bg-white/10 backdrop-blur-md border border-white/20 shadow-2xl rounded-3xl p-8 animate-fadeIn z-10 mt-6">

    {{-- Header --}}
    <div class="text-center mb-6">
      <div class="relative flex justify-center">
        <div class="bg-gradient-to-tr from-yellow-400 to-emerald-400 p-[2px] rounded-full">
          <img src="{{ asset('storage/image/sejarah.jpg') }}" alt="Logo MAN Ambon" class="w-20 h-20 rounded-full bg-white shadow-lg animate-float">
        </div>
      </div>
      <h2 class="mt-4 text-3xl font-extrabold bg-gradient-to-r from-yellow-400 via-emerald-300 to-green-500 bg-clip-text text-transparent drop-shadow-lg tracking-wide">
        Registrasi Siswa
      </h2>
      <p class="text-emerald-100 text-sm mt-1">Buat akun siswa untuk mengakses portal MAN Ambon</p>
    </div>

    {{-- Error message --}}
    @if ($errors->any())
      <div class="alert alert-error mb-4 rounded-lg shadow-lg text-sm">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('register.siswa.post') }}" method="POST" class="space-y-4 relative">
      @csrf

      {{-- Nama --}}
      <div class="form-control">
        <label class="label font-semibold text-sm text-emerald-100">Nama Lengkap</label>
        <div class="relative flex items-center">
          <i class="fa-solid fa-user absolute left-4 text-emerald-400 text-lg"></i>
          <input type="text" name="name" class="input input-bordered w-full h-12 pl-10 rounded-xl bg-white/20 text-white placeholder-gray-200 border-none focus:ring-2 focus:ring-yellow-400 transition-all" required placeholder="Masukkan nama lengkap">
        </div>
      </div>

      {{-- Email --}}
      <div class="form-control">
        <label class="label font-semibold text-sm text-emerald-100">Email Sekolah</label>
        <div class="relative flex items-center">
          <i class="fa-solid fa-envelope absolute left-4 text-emerald-400 text-lg"></i>
          <input type="email" name="email" class="input input-bordered w-full h-12 pl-10 rounded-xl bg-white/20 text-white placeholder-gray-200 border-none focus:ring-2 focus:ring-yellow-400 transition-all" required placeholder="contoh@sekolah.sch.id">
        </div>
      </div>

      {{-- Password --}}
      <div class="form-control">
        <label class="label font-semibold text-sm text-emerald-100">Password</label>
        <div class="relative flex items-center">
          <i class="fa-solid fa-lock absolute left-4 text-emerald-400 text-lg"></i>
          <input type="password" name="password" class="input input-bordered w-full h-12 pl-10 rounded-xl bg-white/20 text-white placeholder-gray-200 border-none focus:ring-2 focus:ring-yellow-400 transition-all" required placeholder="Masukkan password">
        </div>
      </div>

      {{-- Konfirmasi Password --}}
      <div class="form-control">
        <label class="label font-semibold text-sm text-emerald-100">Konfirmasi Password</label>
        <div class="relative flex items-center">
          <i class="fa-solid fa-key absolute left-4 text-emerald-400 text-lg"></i>
          <input type="password" name="password_confirmation" class="input input-bordered w-full h-12 pl-10 rounded-xl bg-white/20 text-white placeholder-gray-200 border-none focus:ring-2 focus:ring-yellow-400 transition-all" required placeholder="Ulangi password">
        </div>
      </div>

      {{-- NIS (opsional) --}}
      <div class="form-control">
        <label class="label font-semibold text-sm text-emerald-100">NIS (Opsional)</label>
        <div class="relative flex items-center">
          <i class="fa-solid fa-id-card absolute left-4 text-emerald-400 text-lg"></i>
          <input type="text" name="nis" class="input input-bordered w-full h-12 pl-10 rounded-xl bg-white/20 text-white placeholder-gray-200 border-none focus:ring-2 focus:ring-yellow-400 transition-all" placeholder="Masukkan NIS (jika ada)">
        </div>
      </div>

      {{-- Tombol Daftar --}}
      <button class="btn w-full h-12 rounded-xl bg-gradient-to-r from-yellow-400 to-emerald-500 border-none text-white font-bold hover:scale-[1.03] hover:brightness-110 transition-all duration-300 shadow-lg mt-2">
        <i class="fa-solid fa-user-plus mr-2"></i> Daftar
      </button>
    </form>

    {{-- Footer --}}
    <div class="text-center mt-6">
      <p class="text-emerald-100 text-sm">Sudah punya akun?</p>
      <a href="{{ route('login.siswa.login-siswa') }}" class="text-yellow-300 font-semibold hover:text-white transition-all duration-200">
        Kembali ke Login
      </a>
    </div>
  </div>
</div>

{{-- Animasi --}}
<style>
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fadeIn { animation: fadeIn 0.8s ease-in-out; }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-6px); }
  }
  .animate-float { animation: float 3s ease-in-out infinite; }
</style>
@endsection
