@extends('layouts.app')

@section('content')
<section id="sejarah" class="py-20 bg-gradient-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
  <div class="max-w-6xl mx-auto px-6">
    
    {{-- Judul --}}
    <div class="text-center mb-14">
      <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight bg-gradient-to-r from-blue-700 via-sky-500 to-cyan-400 text-transparent bg-clip-text drop-shadow-md">
        🕌 Sejarah MAN Ambon
      </h2>
      <p class="mt-4 text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
        Menelusuri perjalanan panjang Madrasah Aliyah Negeri Ambon dari masa ke masa.
      </p>
      <div class="w-24 h-1 mx-auto mt-5 bg-gradient-to-r from-blue-600 via-sky-500 to-cyan-400 rounded-full shadow-md"></div>
    </div>

    {{-- Card Sejarah --}}
    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden transform hover:-translate-y-1 transition duration-500">
      
      {{-- Gambar --}}
      <div class="w-full bg-gray-100 dark:bg-gray-700 flex justify-center items-center">
        <img 
          src="{{ asset('storage/image/sejarah.jpg') }}" 
          alt="Sejarah MAN Ambon"
          class="max-h-[600px] w-auto object-contain p-4"
        >
      </div>

      {{-- Teks Sejarah --}}
      <div class="p-10 text-gray-800 dark:text-gray-200 leading-relaxed text-justify space-y-5">
        <p>
          <span class="font-semibold text-blue-600 dark:text-sky-400">Tahun 1975</span> — PGA Negeri Ambon yang berlokasi di Desa Batu Merah, Kota Madya Ambon, dipindahkan ke Tulehu, Kecamatan Salahatu, Kabupaten Maluku Tengah. Sejak itu, Kota Ambon tidak lagi memiliki lembaga pendidikan tingkat menengah berciri khas Islam. Saat itu, PGA Negeri Ambon dipimpin oleh <strong>Drs. Abdurrahman Umarella</strong>.
        </p>

        <p>
          Di tahun yang sama, sebuah <span class="italic text-blue-500">PGA Swasta</span> didirikan di Desa Batu Merah oleh <strong>Drs. Usman Rumbia</strong>. Setelah beroperasi lima tahun, tepatnya tahun 1985, lembaga ini berubah menjadi <strong>Madrasah Aliyah Swasta</strong>, yang kemudian hari menjadi embrio <strong>MAN 1 Ambon</strong>.
        </p>

        <p>
          Berdasarkan <strong>SK Menteri Agama RI H. Munawir Sadzali Nomor 137 Tahun 1991</strong>, madrasah ini resmi menjadi <strong>Madrasah Aliyah Negeri 1 Ambon</strong> pada 17 Februari 1992, berlokasi di Jl. Kesatrian No.1 Batu Merah (kini menjadi lokasi MI Negeri Ambon).
        </p>

        <p>
          <span class="font-semibold text-blue-600 dark:text-sky-400">Tahun 1998</span>, MAN 1 Ambon pindah ke lokasi baru di Jl. Kembang Buton No.1, Kampung Wara, Air Kuning, Ambon. Setelah Drs. Usman Rumbia wafat, kepemimpinan berpindah dari <strong>Pjs. Bahtiar Udjir</strong> ke <strong>Drs. Umar Masuku</strong>, lalu <strong>Drs. Muhammad Shodik</strong> (2002–2013), dan akhirnya kepada <strong>Drs. Sirajudin Mahubessy, M.M.Pd</strong>.
        </p>

        <div class="border-l-4 border-sky-400 pl-5 italic bg-sky-50 dark:bg-sky-900/40 py-4 rounded-r-lg">
          MAN 1 Ambon adalah satu-satunya madrasah aliyah berciri Islami di Kota Ambon yang berstatus negeri. 
          Awalnya dirancang sebagai MA Keterampilan dengan fokus pada Teknologi Pengolahan Hasil Pertanian, 
          Reparasi Komputer, dan Menjahit. 
        </div>

        <p>
          Mulai tahun <strong>2003</strong>, madrasah ini melakukan reorientasi program melalui visi:
          <span class="block text-center text-xl font-semibold text-sky-600 dark:text-sky-400 mt-2">
            “Unggul dalam Prestasi, Terpuji dalam Perilaku, Siap Berkarya di Masyarakat”
          </span>
        </p>

        <p>
          Kini, meskipun tidak lagi berstatus MA Keterampilan, semangat vokasional tetap dijaga melalui 
          <strong>Program Pendidikan Kecakapan Hidup (Life Skill Education)</strong>, yang membekali siswa 
          dengan ilmu, iman, dan keterampilan agar menjadi generasi cerdas, agamis, dan produktif.
        </p>

        <p class="mt-6 text-center text-lg font-semibold text-blue-700 dark:text-sky-400">
          🏫 Pada tahun 2017, nama “MAN 1 Ambon” resmi berubah menjadi “MAN Ambon” — satu-satunya 
          Madrasah Aliyah Negeri di Kota Ambon.
        </p>
      </div>
    </div>

    {{-- Tombol Kembali --}}
    <div class="text-center mt-14">
      <a href="{{ route('welcome') }}" 
        class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 via-sky-500 to-cyan-400 text-white font-semibold px-8 py-3 rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 hover:from-cyan-500 hover:to-blue-600 transition-all duration-300 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali ke Halaman Sebelumnya
      </a>
    </div>

  </div>
</section>

@endsection
