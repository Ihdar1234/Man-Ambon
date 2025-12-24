@extends('backend.dashboard')

@section('content')
<section class="py-20 bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">

    <div class="max-w-6xl mx-auto px-6">

        {{-- === JUDUL ARTIKEL === --}}
        <div class="text-center mb-14">
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight 
                       bg-gradient-to-r from-indigo-700 via-purple-500 to-pink-400
                       text-transparent bg-clip-text drop-shadow-md">
                {{ $artikel->judul }}
            </h2>

            <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-3xl mx-auto flex flex-wrap justify-center gap-4">

                <span class="px-4 py-1.5 rounded-full bg-gray-100 dark:bg-gray-800 shadow-sm flex items-center gap-2">
                    <i class="fas fa-user text-indigo-600"></i>
                    {{ $artikel->penulis }}
                </span>

                <span class="px-4 py-1.5 rounded-full bg-gray-100 dark:bg-gray-800 shadow-sm flex items-center gap-2">
                    <i class="fas fa-calendar text-indigo-600"></i>
                    {{ $artikel->created_at->translatedFormat('d F Y') }}
                </span>

            </p>

            <div class="w-24 h-1 mx-auto mt-5 
                        bg-gradient-to-r from-indigo-600 via-purple-500 to-pink-400 
                        rounded-full shadow-md"></div>
        </div>


        {{-- === CARD ARTIKEL PREMIUM === --}}
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl 
                    overflow-hidden transform hover:-translate-y-1 transition duration-500
                    backdrop-blur-xl border border-white/20">

            {{-- GAMBAR --}}
            @if($artikel->gambar)
            <div class="w-full bg-gray-100 dark:bg-gray-700 flex justify-center items-center">
                <img src="{{ asset('storage/' . $artikel->gambar) }}"
                     class="max-h-[600px] w-auto object-contain p-4">
            </div>
            @endif

            {{-- KONTEN ARTIKEL --}}
            <div class="p-10 text-gray-800 dark:text-gray-200 leading-relaxed space-y-6">

                <article class="prose dark:prose-invert max-w-none prose-lg">
                    {!! $artikel->isi !!}
                </article>

                <div class="border-l-4 border-indigo-400 pl-5 italic bg-indigo-50 dark:bg-indigo-900/30 py-4 rounded-r-lg">
                    Artikel ini terakhir diperbarui 
                    <strong>{{ $artikel->updated_at->diffForHumans() }}</strong>.
                </div>
            </div>
        </div>


        {{-- === TOMBOL KEMBALI === --}}
        <div class="text-center mt-14">
            <a href="{{ route('artikel.index') }}"
                class="inline-flex items-center gap-3 
                       bg-gradient-to-r from-indigo-600 via-purple-500 to-pink-400
                       text-white font-semibold px-8 py-3 rounded-2xl shadow-lg 
                       hover:shadow-2xl hover:scale-105 
                       hover:from-pink-500 hover:to-indigo-600
                       transition-all duration-300 ease-in-out">

                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 19l-7-7 7-7" />
                </svg>

                Kembali ke Daftar Artikel
            </a>
        </div>

    </div>

</section>
@endsection
