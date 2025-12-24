@extends('layouts.app')

@section('content')

{{-- ===========================
      HERO SWIPER 
=========================== --}}
<div class="relative w-full max-w-7xl mx-auto mt-8 rounded-2xl overflow-hidden shadow-lg">

   <div class="swiper mySwiper2 w-full max-w-[1200px] mx-auto h-[90vh] md:h-[95vh] lg:h-[100vh] rounded-3xl overflow-hidden shadow-2xl">
    <div class="swiper-wrapper">
        @foreach (['ax.jpg','ac.webp','as.webp','ax.jpg'] as $img)
            <div class="swiper-slide">
                <img src="{{ asset('/storage/artikel-content/'.$img) }}" 
                     class="w-full h-full object-cover object-center">
            </div>
        @endforeach
    </div>

    <!-- Pagination & Navigation -->
    <div class="swiper-pagination !bottom-6"></div>
    <div class="swiper-button-next !text-white !right-4"></div>
    <div class="swiper-button-prev !text-white !left-4"></div>
</div>


    <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/60 to-transparent">
        <h1 class="text-3xl md:text-5xl font-extrabold text-white p-6">
            Selamat Datang di MAN Ambon
        </h1>
    </div>
</div>


{{-- ===========================
      BERITA TERBARU 
=========================== --}}
<section id="berita" class="py-20 bg-white dark:bg-gray-900">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Title --}}
        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold text-green-700">
                📰 Berita Terbaru
            </h2>
            <div class="w-20 h-1 bg-green-500 mx-auto mt-3 rounded-full"></div>
        </div>

        {{-- Berita Utama --}}
        @if ($artikels->count())
            @php $utama = $artikels->first(); @endphp

            <div class="relative rounded-2xl overflow-hidden shadow-lg mb-16 bg-white">

                <a href="{{ route('home.artikel.lihat', $utama->slug) }}">
                    <img src="{{ $utama->gambar }}" class="w-full h-[420px] object-cover">
                </a>

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent p-6 flex flex-col justify-end">

                    <span class="bg-green-600 text-white text-xs px-3 py-1 rounded-full mb-4 w-fit">
                        {{ $utama->kategori }}
                    </span>

                    <h3 class="text-3xl md:text-4xl font-extrabold text-white mb-4 leading-tight">
                        {{ $utama->judul }}
                    </h3>

                    <p class="text-gray-200 text-sm max-w-xl">
                        {{ Str::limit(strip_tags($utama->isi), 140) }}
                    </p>

                    <div class="mt-4 text-sm text-gray-300 flex justify-between max-w-xl">
                        <span>📅 {{ $utama->created_at->translatedFormat('d F Y') }}</span>
                        <a href="{{ route('home.artikel.lihat', $utama->slug) }}" class="text-green-300">
                            Selengkapnya →
                        </a>
                    </div>
                </div>

            </div>
        @endif


        {{-- 3 Berita --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($artikels->skip(1)->take(3) as $artikel)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-2xl transition overflow-hidden border border-gray-100 dark:border-gray-700">

                    <div class="relative">
                        <a href="{{ route('home.artikel.lihat', $artikel->slug) }}">
                            <img src="{{ $artikel->gambar }}" class="w-full h-52 object-cover group-hover:scale-105 transition">
                        </a>

                        <span class="absolute top-3 left-3 bg-gradient-to-r from-emerald-600 to-green-500 text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-md">
                            {{ $artikel->kategori ?? 'Berita' }}
                        </span>
                    </div>

                    <div class="p-6">
                        <h3 class="text-lg font-bold mb-2 leading-snug bg-gradient-to-r from-emerald-700 via-green-600 to-emerald-500 text-transparent bg-clip-text">
                            <a href="{{ route('home.artikel.lihat', $artikel->slug) }}">
                                {{ Str::limit($artikel->judul, 70) }}
                            </a>
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 leading-relaxed">
                            {{ Str::limit(strip_tags($artikel->isi), 100) }}
                        </p>

                        <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mb-4">
                            <span>📅 {{ $artikel->created_at->translatedFormat('d M Y') }}</span>
                            <a href="{{ route('home.artikel.lihat', $artikel->slug) }}" class="text-emerald-600 hover:underline">
                                Baca →
                            </a>
                        </div>

                        {{-- Vote --}}
                        <div class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 pt-4 mt-3">
                            <div class="vote-container flex items-center gap-4" data-artikel="{{ $artikel->slug }}">

                                <button data-type="like" class="vote-btn bg-gray-200 px-3 py-1.5 rounded-full">
                                    👍 <span class="like-count">{{ $artikel->votes()->where('vote_type','like')->count() }}</span>
                                </button>

                                <button data-type="dislike" class="vote-btn bg-gray-200 px-3 py-1.5 rounded-full">
                                    👎 <span class="dislike-count">{{ $artikel->votes()->where('vote_type','dislike')->count() }}</span>
                                </button>

                                <button data-type="suka" class="vote-btn bg-gray-200 px-3 py-1.5 rounded-full">
                                    ❤️ <span class="suka-count">{{ $artikel->votes()->where('vote_type','suka')->count() }}</span>
                                </button>

                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-16">
            <a href="/berita" class="inline-block bg-gradient-to-r from-emerald-600 to-green-500 text-white font-semibold px-8 py-3 rounded-xl shadow-md hover:scale-105 transition">
                🔍 Lihat Semua Berita
            </a>
        </div>

    </div>
</section>



{{-- ===========================
      KALENDER 
=========================== --}}
<section id="kalender" class="py-16 bg-gray-50 dark:bg-gray-800 w-full">

    <div class="text-center mb-12">
        <h2 class="text-4xl font-extrabold bg-gradient-to-r from-blue-700 via-sky-500 to-cyan-400 text-transparent bg-clip-text">
            📅 Kalender Pendidikan
        </h2>
        <div class="w-24 h-1 mx-auto mt-3 bg-gradient-to-r from-blue-600 via-sky-500 to-cyan-400"></div>
    </div>

    <div class="flex justify-center">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition w-[90%] md:w-[70%] lg:w-[60%] xl:w-[50%]">

            <img src="{{ asset('storage/' . ($kalenders->first()->gambar ?? 'default.jpg')) }}"
                 class="w-full h-[80vh] object-contain bg-gray-100">

            <div class="p-6 text-center">
                <h3 class="text-xl font-semibold text-blue-500">
                    {{ $kalenders->first()->judul ?? 'Kalender Pendidikan MAN Ambon' }}
                </h3>
            </div>

        </div>
    </div>

</section>



{{-- ===========================
      GALERI 
=========================== --}}
<section id="galeri" class="py-16 bg-gray-50 dark:bg-gray-900">

    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-12">
            <h2 class="text-4xl font-extrabold bg-gradient-to-r from-pink-600 via-fuchsia-500 to-purple-500 text-transparent bg-clip-text">
                🖼️ Galeri
            </h2>
            <div class="w-24 h-1 mx-auto mt-3 bg-gradient-to-r from-pink-500 via-fuchsia-500 to-purple-500"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($galeris as $item)
                <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                    <a href="{{ route('home.detail', $item->slug) }}">
                        <img src="{{ $item->gambar }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-3 text-center">
                        <h3 class="font-semibold text-gray-800 text-sm">{{ $item->judul }}</h3>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-14">
            <a href="#"
                class="inline-block bg-gradient-to-r from-emerald-600 to-green-500 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transition">
                🔍 Lihat Semua Galeri
            </a>
        </div>

    </div>

</section>



{{-- ===========================
      VIDEO 
=========================== --}}
<section id="video" class="py-16 bg-white dark:bg-gray-900">
    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold bg-gradient-to-r from-emerald-700 via-green-600 to-emerald-500 text-transparent bg-clip-text">
                🎥 Video Profil MAN Ambon
            </h2>
            <div class="w-24 h-1 mx-auto mt-3 bg-gradient-to-r from-emerald-600 via-green-500 to-emerald-400"></div>
        </div>

        <div class="relative">
            <iframe class="w-full h-64 md:h-96 rounded-lg shadow-lg"
                src="https://www.youtube.com/embed/elB24poTan0" allowfullscreen></iframe>
        </div>

    </div>
</section>

@endsection
