@extends('backend.dashboard')

@section('content')

<section 
    class="py-16 bg-gradient-to-b from-gray-50 to-gray-100 
           dark:from-gray-900 dark:to-gray-800">

    <div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-10">

        {{-- TITLE PREMIUM --}}
        <div class="text-center mb-12">

            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight
                       bg-gradient-to-r from-indigo-600 via-purple-500 to-pink-400
                       text-transparent bg-clip-text drop-shadow-md">
                {{ $artikel->judul }}
            </h1>

            <div class="flex justify-center gap-3 mt-4 flex-wrap">

                <span class="px-4 py-1.5 rounded-full
                             bg-white/70 dark:bg-gray-800/70 
                             shadow border border-gray-200/40
                             flex items-center gap-2 backdrop-blur">
                    <i class="fas fa-user text-indigo-600"></i>
                    {{ $artikel->penulis }}
                </span>

                <span class="px-4 py-1.5 rounded-full
                             bg-white/70 dark:bg-gray-800/70 
                             shadow border border-gray-200/40
                             flex items-center gap-2 backdrop-blur">
                    <i class="fas fa-calendar text-indigo-600"></i>
                    {{ $artikel->created_at->translatedFormat('d F Y') }}
                </span>

            </div>

            <div class="w-20 h-1 bg-gradient-to-r from-indigo-600 to-pink-400 mx-auto mt-6 rounded-full"></div>
        </div>

        {{-- CARD --}}
        <div class="bg-white/90 dark:bg-gray-800/70 
                    rounded-3xl shadow-2xl backdrop-blur-xl 
                    border border-white/40 dark:border-gray-700/40
                    overflow-hidden">

            {{-- IMAGE --}}
            @if($artikel->gambar)
            <div class="relative">
                <img src="{{ asset($artikel->gambar) }}"
                     class="w-full max-h-[480px] object-cover rounded-t-3xl">

                <div class="absolute inset-0 
                            bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
            </div>
            @endif

            {{-- CONTENT --}}
            <div class="p-6 sm:p-8 md:p-10 relative text-gray-800 dark:text-gray-200">

                <article class="prose prose-lg dark:prose-invert max-w-none
                                prose-headings:text-gray-900 dark:prose-headings:text-white
                                prose-img:rounded-xl prose-img:shadow-xl">
                    {!! $artikel->isi !!}
                </article>

                <div class="mt-6 p-4 pl-6 border-l-4 border-indigo-500
                            bg-indigo-50 dark:bg-indigo-900/30 
                            rounded-r-xl shadow-sm italic">
                    Artikel diperbarui <b>{{ $artikel->updated_at->diffForHumans() }}</b>.
                </div>
            </div>
        </div>

        {{-- BUTTON --}}
        <div class="text-center mt-12 mb-6">
            <a href="{{ route('artikel.index') }}"
                class="inline-flex items-center gap-3
                       bg-gradient-to-r from-indigo-600 via-purple-500 to-pink-400
                       text-white font-semibold px-7 py-3 rounded-2xl
                       shadow-lg hover:shadow-2xl hover:scale-105
                       transition-all duration-300">

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
