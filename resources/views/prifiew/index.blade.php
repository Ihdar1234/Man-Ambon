@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-emerald-50 via-white to-teal-50 py-16 mt-20">
  <div class="max-w-[95%] mx-auto">

    <!-- Judul Halaman -->
    <div class="text-center mb-16">
      <h1 class="text-5xl font-extrabold mb-6 tracking-wide uppercase
                 bg-gradient-to-r from-emerald-600 via-green-500 to-teal-400
                 text-transparent bg-clip-text drop-shadow-[0_3px_6px_rgba(0,0,0,0.25)]">
       Kalender Pendidikan
      </h1>
      <div class="w-48 h-1.5 bg-gradient-to-r from-emerald-600 to-teal-400 mx-auto mb-6 rounded-full shadow-md"></div>

      <!-- Teks dengan Background Elegan -->
      <div class="inline-block px-8 py-3 rounded-2xl shadow-lg 
                  bg-gradient-to-r from-amber-100 via-yellow-50 to-lime-100 
                  border border-amber-200/70 backdrop-blur-md
                  hover:shadow-2xl transition-all duration-500">
        <p class="text-2xl italic font-semibold 
                  bg-gradient-to-r from-amber-500 via-yellow-400 to-lime-500
                  text-transparent bg-clip-text drop-shadow-[0_2px_4px_rgba(0,0,0,0.25)]">
          Madrasah Aliyah Negeri Ambon
        </p>
      </div>
    </div>

    <!-- Card Struktur Organisasi -->
    @forelse ($kal as $data)
      <div class="card bg-base-100 shadow-2xl hover:shadow-3xl transition-all duration-700 rounded-3xl overflow-hidden w-full h-[700px] mx-auto mb-12 border border-emerald-200/40 hover:border-emerald-400/70">
        
        <!-- Gambar Struktur -->
        <figure class="w-full h-full bg-gray-50 flex items-center justify-center">
          <img 
            src="{{ asset('storage/'.$data->gambar) }}" 
            alt="{{ $data->judul }}" 
            class="w-full h-full object-contain bg-white transition-transform duration-700 hover:scale-105"
          >
        </figure>

        <!-- Judul -->
        <div class="p-8 text-center">
          <h2 class="text-3xl font-semibold bg-gradient-to-r from-emerald-600 via-green-500 to-teal-400 text-transparent bg-clip-text mb-2 drop-shadow-[0_2px_5px_rgba(0,0,0,0.2)]">
            {{ $data->judul }}
          </h2>
          <p class="text-gray-600 italic text-sm">Struktur Organisasi MAN Ambon</p>
        </div>
      </div>
    @empty
      <p class="text-center text-gray-500 text-lg">Belum ada data struktur organisasi.</p>
    @endforelse

    <!-- Tombol Kembali -->
    <div class="text-center mt-12">
      <a href="{{ route('welcome') }}" 
         class="inline-block bg-gradient-to-r from-emerald-600 to-green-500 text-white font-semibold px-10 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300">
        ⬅️ Kembali ke Beranda
      </a>
    </div>

  </div>
</section>
@endsection
