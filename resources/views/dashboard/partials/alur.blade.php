<section id="alur" class="py-20 bg-gradient-to-b from-blue-50 via-white to-green-50">
  <div class="container mx-auto text-center px-6">
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-16">Alur Pendaftaran</h2>

    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      @foreach ([
        ['icon' => 'fa-user-plus', 'title' => 'Registrasi Akun', 'desc' => 'Buat akun PPDB di sistem online MAN Ambon.'],
        ['icon' => 'fa-file-circle-check', 'title' => 'Lengkapi Data', 'desc' => 'Isi formulir dan unggah berkas yang diperlukan.'],
        ['icon' => 'fa-magnifying-glass', 'title' => 'Verifikasi', 'desc' => 'Panitia akan memeriksa kelengkapan data pendaftar.'],
        ['icon' => 'fa-award', 'title' => 'Pengumuman', 'desc' => 'Lihat hasil seleksi di halaman pengumuman PPDB.'],
      ] as $step)
      <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-lg p-6 transform transition duration-500 hover:scale-105 hover:-translate-y-3 hover:shadow-2xl ring-1 ring-blue-200" data-aos="fade-up">
        <div class="flex flex-col items-center space-y-4">
          <i class="fa-solid {{ $step['icon'] }} text-5xl text-blue-500 drop-shadow-md"></i>
          <h3 class="text-xl md:text-2xl font-bold text-gray-800">{{ $step['title'] }}</h3>
          <p class="text-gray-600 leading-relaxed text-center">{{ $step['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
