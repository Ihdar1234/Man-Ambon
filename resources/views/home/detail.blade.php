@extends('layouts.app')

@section('content')
<div class="mt-24 min-h-screen bg-gray-50 dark:bg-gray-900 pb-20">

  {{-- WRAPPER --}}
  <div class="max-w-5xl mx-auto px-4 md:px-6">

    {{-- HEADER --}}
   <div class="relative text-center mb-16 py-10">

  {{-- Background lembut dengan efek cahaya --}}
  <div class="absolute inset-0 bg-gradient-to-r from-emerald-500/10 via-green-400/5 to-emerald-500/10 blur-3xl opacity-60"></div>

  {{-- Konten Judul --}}
  <div class="relative z-10">
    <h1 class="text-4xl md:text-5xl font-extrabold bg-gradient-to-r from-emerald-600 via-green-500 to-emerald-400 bg-clip-text text-transparent mb-4 leading-tight tracking-tight drop-shadow-sm animate-fade-in-down">
      {{ $galeri->judul }}
    </h1>

    <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base flex justify-center items-center gap-2 animate-fade-in-up">
      <span>📅</span>
      <span>Diposting {{ $galeri->created_at->translatedFormat('d F Y') }}</span>
    </p>

    {{-- Garis dekoratif dengan animasi --}}
    <div class="relative w-32 h-[3px] mx-auto mt-5">
      <div class="absolute inset-0 bg-gradient-to-r from-transparent via-emerald-500 to-transparent rounded-full animate-pulse"></div>
    </div>
  </div>
</div>
    {{-- CARD UTAMA --}}
    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">
      
      {{-- GAMBAR --}}
      <div class="relative w-full bg-gray-100 dark:bg-gray-700 flex justify-center items-center">
        <img 
          src="{{ asset($galeri->gambar) }}" 
          alt="{{ $galeri->judul }}" 
          class="max-w-full max-h-[80vh] object-contain transition-transform duration-700 ease-out hover:scale-105"
        >
      </div>

      {{-- BODY --}}
      <div class="p-8 md:p-10 space-y-6">
        <article class="prose dark:prose-invert max-w-none leading-relaxed text-gray-700 dark:text-gray-200 text-justify">
          {!! $galeri->deskripsi ?? '<p>Tidak ada deskripsi untuk gambar ini.</p>' !!}
        </article>

        {{-- META --}}
        <div class="border-t border-gray-200 dark:border-gray-700 pt-4 flex flex-wrap justify-between text-sm text-gray-500 dark:text-gray-400">
          <span>📅 Diperbarui: {{ $galeri->updated_at->diffForHumans() }}</span>
        </div>
      </div>
    </div>

    {{-- BAGIAN BAWAH --}}
    <div class="text-center mt-12 space-y-6">

      {{-- TOMBOL KEMBALI --}}
      <a href="{{ route('welcome') }}#galeri"
         class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-green-500 hover:from-green-700 hover:to-emerald-600 text-white font-semibold px-8 py-3 rounded-full shadow-md hover:shadow-lg transition-all duration-300">
         ⬅️ Kembali ke Galeri
      </a>

      {{-- OPSIONAL: SHARE --}}
      <div class="flex justify-center gap-4 mt-4">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"
           class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 hover:bg-blue-700 text-white shadow-md transition">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank"
           class="w-10 h-10 flex items-center justify-center rounded-full bg-sky-500 hover:bg-sky-600 text-white shadow-md transition">
          <i class="bi bi-twitter"></i>
        </a>
        <a href="https://api.whatsapp.com/send?text={{ urlencode($galeri->judul . ' ' . request()->fullUrl()) }}" target="_blank"
           class="w-10 h-10 flex items-center justify-center rounded-full bg-green-500 hover:bg-green-600 text-white shadow-md transition">
          <i class="bi bi-whatsapp"></i>
        </a>
        <button onclick="navigator.clipboard.writeText('{{ request()->fullUrl() }}')" 
                class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-600 hover:bg-gray-700 text-white shadow-md transition"
                title="Salin tautan">
          <i class="bi bi-link-45deg"></i>
        </button>
      </div>
    </div>
  </div>
</div>
@endsection
