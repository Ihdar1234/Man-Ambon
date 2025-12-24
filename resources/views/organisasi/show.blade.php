@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-50 dark:bg-gray-900">
  <div class="max-w-6xl mx-auto px-6">
      {{-- Gambar utama --}}
      @if ($item->image)
      <div class="relative mb-12">
          <img src="{{ asset('storage/' . $item->image) }}" 
               alt="{{ $item->judul }}" 
               class="w-full h-[450px] object-cover rounded-3xl shadow-xl">
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent rounded-3xl"></div>
          <h2 class="absolute bottom-6 left-6 text-4xl font-extrabold text-white drop-shadow-lg">
              {{ $item->judul }}
          </h2>
      </div>
      @endif

      {{-- Judul --}}
      <div class="text-center mb-14">
          <h3 class="text-4xl font-extrabold bg-gradient-to-r from-emerald-600 via-green-500 to-emerald-400 text-transparent bg-clip-text drop-shadow-md">
              Struktur Organisasi MAN Ambon
          </h3>
          <p class="text-gray-600 dark:text-gray-300 mt-4 max-w-2xl mx-auto text-lg">
              Struktur organisasi ini menggambarkan hubungan dan tanggung jawab antar posisi di lingkungan Madrasah Aliyah Negeri Ambon.
          </p>
      </div>

      {{-- Diagram Organisasi --}}
      <div class="overflow-x-auto">
          <div class="flex flex-col items-center">
              
              {{-- Kepala Madrasah --}}
              <div class="bg-white dark:bg-gray-800 border-4 border-emerald-500 shadow-lg rounded-2xl px-8 py-6 text-center mb-8 w-72">
                  <h4 class="text-xl font-bold text-emerald-700 dark:text-emerald-400">Kepala Madrasah</h4>
                  <p class="text-gray-600 dark:text-gray-300">Drs. Ahmad Yusuf</p>
              </div>

              {{-- Garis --}}
              <div class="w-1 h-10 bg-emerald-500"></div>

              {{-- Wakil Kepala --}}
              <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                  <div class="bg-white dark:bg-gray-800 border-2 border-green-400 rounded-xl shadow-md px-6 py-4 text-center">
                      <h5 class="font-semibold text-green-600">Wakil Kurikulum</h5>
                      <p class="text-gray-600 dark:text-gray-300">Siti Rahma, S.Pd</p>
                  </div>
                  <div class="bg-white dark:bg-gray-800 border-2 border-green-400 rounded-xl shadow-md px-6 py-4 text-center">
                      <h5 class="font-semibold text-green-600">Wakil Kesiswaan</h5>
                      <p class="text-gray-600 dark:text-gray-300">Budi Santoso, M.Pd</p>
                  </div>
                  <div class="bg-white dark:bg-gray-800 border-2 border-green-400 rounded-xl shadow-md px-6 py-4 text-center">
                      <h5 class="font-semibold text-green-600">Wakil Humas</h5>
                      <p class="text-gray-600 dark:text-gray-300">Nur Aini, S.Ag</p>
                  </div>
              </div>

              {{-- Garis --}}
              <div class="w-1 h-10 bg-emerald-500"></div>

              {{-- Guru dan Staf --}}
              <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                  @foreach (['Guru Mapel', 'Guru BK', 'Kepala TU', 'Staf TU'] as $posisi)
                  <div class="bg-white dark:bg-gray-800 border border-emerald-300 rounded-lg shadow px-5 py-4 text-center">
                      <h6 class="font-semibold text-emerald-600">{{ $posisi }}</h6>
                      <p class="text-gray-600 dark:text-gray-300 text-sm">Nama Pegawai</p>
                  </div>
                  @endforeach
              </div>

              {{-- Garis --}}
              <div class="w-1 h-10 bg-emerald-500"></div>

              {{-- Siswa --}}
              <div class="bg-white dark:bg-gray-800 border-2 border-green-300 rounded-xl shadow px-10 py-6 text-center w-80">
                  <h5 class="font-semibold text-green-600">Siswa / Siswi MAN Ambon</h5>
                  <p class="text-gray-600 dark:text-gray-300">Angkatan 2024 / 2025</p>
              </div>
          </div>
      </div>

      {{-- Tombol kembali --}}
      <div class="text-center mt-16">
          <a href="{{ route('struktur.index') }}" 
             class="inline-block bg-gradient-to-r from-emerald-600 to-green-500 text-white font-semibold px-8 py-3 rounded-xl shadow-md hover:scale-105 transition-all duration-300">
              ← Kembali ke Daftar
          </a>
      </div>
  </div>
</section>
@endsection
