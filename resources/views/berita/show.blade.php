@extends('layouts.app')

@section('content')
<div class="mt-24 min-h-screen bg-gray-50 dark:bg-gray-900 pb-20">

  <div class="max-w-5xl mx-auto px-4 md:px-6">

    {{-- HEADER --}}
   {{-- HEADER --}}
<div class="relative inline-block mb-4 text-center w-full overflow-visible">
  <h1 
    class="text-4xl md:text-5xl font-extrabold tracking-tight drop-shadow-md leading-snug inline-block relative"
    style="line-height: 1.30;"
  >
    <span 
      class="bg-gradient-to-r from-emerald-600 via-green-500 to-emerald-400 
             bg-clip-text text-transparent"
      style="
        -webkit-background-clip: text; 
        -webkit-text-fill-color: transparent;
        display: inline-block;
      "
    >
      {{ $artikel->judul }}
    </span>
  </h1>

  {{-- GARIS DEKORATIF --}}
  <span 
    class="absolute left-1/2 -bottom-2 -translate-x-1/2 
           w-28 h-[4px] rounded-full 
           bg-gradient-to-r from-emerald-600 via-green-400 to-emerald-500 
           animate-gradient-flow shadow-md"
  ></span>
</div>
    <p class="text-gray-600 dark:text-gray-300 text-sm md:text-base flex justify-center items-center gap-2 mb-6">
      📅 Diposting {{ $artikel->created_at->translatedFormat('d F Y') }}
    </p>

    {{-- CARD --}}
    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700">

      {{-- GAMBAR FULL WIDTH & HEIGHT --}}
      <div class="w-full h-[70vh] md:h-[80vh] relative bg-gray-100 dark:bg-gray-700 flex justify-center items-center overflow-hidden">
        <img 
          src="{{ asset($artikel->gambar) }}" 
          alt="{{ $artikel->judul }}" 
          class="w-full h-full object-cover transition-transform duration-700 hover:scale-105"
        >
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-black/20 pointer-events-none"></div>
      </div>

      {{-- BODY --}}
      <div class="p-8 md:p-10 space-y-6">
        <article class="prose dark:prose-invert max-w-none leading-relaxed text-gray-700 dark:text-gray-200 text-justify">
          {!! $artikel->isi ?? '<p>Tidak ada isi untuk artikel ini.</p>' !!}
        </article>

        <div class="border-t border-gray-200 dark:border-gray-700 pt-4 flex flex-wrap justify-between text-sm text-gray-500 dark:text-gray-400">
          <span>📅 Diperbarui: {{ $artikel->updated_at->diffForHumans() }}</span>
        </div>
      </div>
    </div>

    {{-- TOMBOL KEMBALI --}}
    <div class="text-center mt-10">
      <a href="{{ route('berita.index') }}#artikel"
         class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-600 to-green-500 hover:from-green-700 hover:to-emerald-600 text-white font-semibold px-8 py-3 rounded-full shadow-md hover:shadow-lg transition-all duration-300">
         ⬅️ Kembali ke Beranda
      </a>
    </div>

  </div>
</div>
@endsection
