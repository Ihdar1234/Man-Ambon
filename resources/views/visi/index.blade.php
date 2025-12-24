@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-base-100 py-16">
  <div class="container mx-auto px-6">
    
    <!-- Judul Halaman -->
    <div class="text-center mb-20 px-4">
      <h1
        class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-400 mb-6 tracking-wide uppercase drop-shadow-sm transition-all duration-500 hover:scale-105"
      >
        Visi & Misi
      </h1>

      <div class="flex justify-center mb-6">
        <div class="w-20 h-1 bg-gradient-to-r from-green-500 to-emerald-400 rounded-full animate-pulse"></div>
      </div>

      <p
        class="text-gray-700 dark:text-gray-300 text-lg md:text-xl italic font-medium max-w-2xl mx-auto leading-relaxed"
      >
        Madrasah Aliyah Negeri Ambon
      </p>

      <div class="mt-8 flex justify-center">
        <button
          onclick="window.history.back()"
          class="btn btn-outline btn-success rounded-full px-8 text-lg transition-all duration-300 hover:scale-105 hover:bg-gradient-to-r hover:from-green-500 hover:to-emerald-400 hover:text-white"
        >
          ← Kembali
        </button>
      </div>
    </div>

    <!-- Konten -->
    <div class="flex flex-col lg:flex-row items-stretch gap-10">

      <!-- Kolom Gambar -->
      <div class="w-full lg:w-1/2 flex flex-col gap-6">
        @foreach ($items as $data)
          <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 h-full">
            <figure class="overflow-hidden rounded-2xl bg-gray-100 flex justify-center items-center h-full">
              <img 
                src="{{ asset('storage/' . $data->image) }}" 
                alt="{{ $data->judul }}"
                class="w-full h-full object-contain bg-white hover:scale-105 transition-transform duration-500"
              >
            </figure>
          </div>
        @endforeach
      </div>

      <!-- Kolom Teks -->
      <div class="w-full lg:w-1/2 flex justify-center px-4">
        <div
          class="card bg-gradient-to-br from-white via-green-50 to-emerald-100 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800 shadow-2xl p-10 rounded-3xl flex flex-col justify-center h-full w-full max-w-2xl border border-green-200 dark:border-gray-700 transition-all duration-500 hover:shadow-green-200/50 hover:-translate-y-1"
        >
          
          <!-- VISI -->
          <div class="mb-10">
            <h2
              class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-400 mb-4 border-b-4 border-green-300 dark:border-emerald-500 inline-block pb-2"
            >
              🌟 Visi
            </h2>
            <p class="text-gray-800 dark:text-gray-200 mb-2 leading-relaxed text-justify text-lg md:text-xl font-medium">
              “Terwujudnya peserta didik yang
              <span class="text-emerald-600 dark:text-emerald-400 font-semibold">beriman</span>,
              <span class="text-emerald-600 dark:text-emerald-400 font-semibold">bertakwa</span>,
              <span class="text-emerald-600 dark:text-emerald-400 font-semibold">berakhlak mulia</span>,
              <span class="text-emerald-600 dark:text-emerald-400 font-semibold">cerdas</span>,
              dan
              <span class="text-emerald-600 dark:text-emerald-400 font-semibold">berwawasan global</span>.”
            </p>
          </div>

          <div class="h-1 w-24 bg-gradient-to-r from-green-400 to-emerald-500 mx-auto mb-8 rounded-full"></div>

          <!-- MISI -->
          <div>
            <h2
              class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-600 to-emerald-400 mb-4 border-b-4 border-green-300 dark:border-emerald-500 inline-block pb-2"
            >
              🎯 Misi
            </h2>
            <ul class="list-disc list-inside text-gray-800 dark:text-gray-200 space-y-4 text-lg md:text-xl leading-relaxed">
              <li>Menumbuhkan penghayatan terhadap ajaran agama Islam dalam kehidupan sehari-hari.</li>
              <li>Meningkatkan kualitas pembelajaran dan prestasi akademik peserta didik.</li>
              <li>Mengembangkan keterampilan, kreativitas, dan potensi diri peserta didik.</li>
              <li>Menanamkan nilai-nilai karakter, tanggung jawab, dan kepedulian sosial.</li>
            </ul>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
@endsection
