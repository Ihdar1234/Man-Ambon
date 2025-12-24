@extends('layouts.app')

@section('content')
<div class="mt-24 min-h-screen bg-gray-50 dark:bg-gray-900 pb-20">
  <div class="max-w-7xl mx-auto px-4 md:px-6">

  <h1 
  class="relative text-4xl md:text-5xl font-extrabold text-center mb-12
         bg-gradient-to-r from-emerald-600 via-green-500 to-emerald-400
         text-transparent bg-clip-text drop-shadow-md
         animate-fade-in"
>
  📰 Semua Artikel Berita
  <span 
    class="block w-24 h-1.5 bg-gradient-to-r from-emerald-500 to-green-400 mx-auto mt-4 rounded-full"
  ></span>
</h1>

    @if ($artikels->isEmpty())
      <div class="text-center text-gray-500 text-lg">
        Belum ada artikel berita yang tersedia.
      </div>
    @else
  <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @foreach ($artikels as $artikel)
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-2xl transition duration-500 overflow-hidden group border border-gray-100 dark:border-gray-700">
          <div class="relative">
            <a href="{{ route('berita.show', $artikel->slug) }}">
              <img src="{{ $artikel->gambar }}" 
                   alt="{{ $artikel->judul }}" 
                   class="w-full h-52 object-cover group-hover:scale-105 transition duration-700">
              <span class="absolute top-3 left-3 bg-gradient-to-r from-emerald-600 to-green-500 text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-md">
                {{ $artikel->kategori ?? 'Berita' }}
              </span>
            </a>
          </div>

          <div class="p-6">
            <h3 class="text-lg font-bold mb-2 leading-snug bg-gradient-to-r from-emerald-700 via-green-600 to-emerald-500 text-transparent bg-clip-text hover:scale-[1.03] transition-transform duration-300">
              <a href="{{ route('berita.show', $artikel->slug) }}">{{ Str::limit($artikel->judul, 70) }}</a>
            </h3>

            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 leading-relaxed">
              {{ Str::limit(strip_tags($artikel->isi), 100) }}
            </p>

            <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mb-4">
              <span>📅 {{ $artikel->created_at->translatedFormat('d M Y') }}</span>
              <a href="{{ route('berita.show', $artikel->slug) }}" class="text-emerald-600 hover:underline">Baca →</a>
            </div>

            {{-- FITUR VOTE --}}
            <div class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 pt-4 mt-3">
              <div class="vote-container flex items-center gap-4" data-artikel="{{ $artikel->slug }}">
                <button data-type="like" class="vote-btn bg-base-200 hover:bg-emerald-100 dark:hover:bg-emerald-900 px-3 py-1.5 rounded-full transition">
                  👍 <span class="like-count">{{ $artikel->votes()->where('vote_type','like')->count() }}</span>
                </button>
                <button data-type="dislike" class="vote-btn bg-base-200 hover:bg-red-100 dark:hover:bg-red-900 px-3 py-1.5 rounded-full transition">
                  👎 <span class="dislike-count">{{ $artikel->votes()->where('vote_type','dislike')->count() }}</span>
                </button>
                <button data-type="suka" class="vote-btn bg-base-200 hover:bg-pink-100 dark:hover:bg-pink-900 px-3 py-1.5 rounded-full transition">
                  ❤️ <span class="suka-count">{{ $artikel->votes()->where('vote_type','suka')->count() }}</span>
                </button>
              </div>
            </div>

          </div>
        </div>
      @endforeach
    </div>
    @endif

  </div>
</div>
@endsection
