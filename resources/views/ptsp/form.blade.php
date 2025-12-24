@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-green-100 pt-32 px-6">

    <div class="max-w-4xl mx-auto fade-up">

        <!-- CARD PREMIUM -->
        <div class="relative bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/30 p-10 transition-all duration-500 hover:shadow-3xl hover:-translate-y-2 hover:scale-[1.02]">

            <!-- HEADER -->
            <div class="flex items-center gap-5 mb-8">
                <div class="p-6 rounded-3xl bg-gradient-to-br from-green-300 to-green-200 text-green-800 flex items-center justify-center text-4xl animate-bounce">
                    <i class="{{ $layanan->icon }}"></i>
                </div>
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-green-800 drop-shadow-lg">{{ $layanan->nama_layanan }}</h1>
                    <p class="text-gray-600 text-sm capitalize tracking-wide">{{ $layanan->kategori }}</p>
                </div>
            </div>

            <!-- DESKRIPSI -->
            <div class="mb-10">
                <h3 class="text-lg font-semibold text-green-700 mb-3">Deskripsi Layanan</h3>
                <p class="text-gray-700 leading-relaxed text-justify">
                    {{ $layanan->deskripsi }}
                </p>
            </div>

            <!-- SYARAT & KETENTUAN -->
            <div class="mb-10">
                <h3 class="text-lg font-semibold text-green-700 mb-3">Persyaratan</h3>
                <div class="bg-green-50 border border-green-200 rounded-2xl p-6 text-gray-700 leading-relaxed shadow-inner">
                    {!! nl2br(e($layanan->persyaratan)) !!}
                </div>
            </div>

            <!-- LAMA PROSES -->
            @if($layanan->lama_proses)
            <div class="mb-10">
                <h3 class="text-lg font-semibold text-green-700 mb-3">Estimasi Lama Proses</h3>
                <div class="inline-block px-6 py-3 bg-gradient-to-r from-amber-200 via-amber-100 to-amber-200 border border-amber-300 rounded-2xl text-amber-800 font-semibold shadow-md hover:shadow-lg transition-all">
                    {{ $layanan->lama_proses }} Hari Kerja
                </div>
            </div>
            @endif

            <!-- JUDUL FORM DINAMIS -->
            <div class="text-center mt-12 mb-6">
                <h2 class="text-2xl md:text-3xl font-bold text-green-800 drop-shadow-md">
                    Formulir Pengajuan {{ $layanan->nama_layanan }}
                </h2>
                <p class="text-gray-600 text-sm mt-2">Silakan isi formulir di bawah ini sesuai persyaratan layanan</p>
            </div>

            <!-- BUTTON AJUKAN -->
            <div class="text-center mt-6">
                <a href="{{ url('/ptsp/' . $layanan->slug . '/form') }}" 
                    class="inline-block py-4 px-12 bg-gradient-to-r from-green-400 via-green-500 to-emerald-400 text-white font-bold text-lg rounded-3xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 glow-btn">
                    Ajukan Permohonan
                </a>
            </div>

        </div>

        <!-- BACK BUTTON -->
        <div class="text-center mt-10">
            <a href="/ptsp" class="text-green-700 hover:text-green-900 hover:underline font-medium transition-all">
                &larr; Kembali ke halaman PTSP
            </a>
        </div>
    </div>

</div>

<style>
/* Animasi bounce icon */
@keyframes bounceIcon {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-6px); }
}
.animate-bounce { animation: bounceIcon 2s infinite ease-in-out; }

/* Tombol glow premium */
.glow-btn {
  box-shadow: 0 0 15px rgba(16, 185, 129, 0.6), 0 0 30px rgba(16, 185, 129, 0.4);
  transition: all 0.3s ease-in-out;
}
.glow-btn:hover {
  box-shadow: 0 0 25px rgba(16, 185, 129, 0.8), 0 0 50px rgba(16, 185, 129, 0.6);
}

/* Card premium hover */
.fade-up { 
  opacity: 0; 
  transform: translateY(20px); 
  animation: fadeUp 0.8s forwards; 
  animation-delay: 0.2s;
}
@keyframes fadeUp { 
  to { opacity: 1; transform: translateY(0); } 
}
</style>

@endsection
