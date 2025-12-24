<section id="beranda" class="hero min-h-screen bg-gradient-to-r from-blue-100 via-white to-green-100 pt-32">
  <div class="hero-content flex flex-col-reverse lg:flex-row items-center gap-12 max-w-7xl mx-auto px-6">
    
    <!-- Teks di kiri -->
    <div data-aos="fade-right" class="text-center lg:text-left lg:w-1/2 space-y-6">
      <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600 drop-shadow-lg animate-fadeIn">
        Penerimaan Peserta Didik Baru
      </h1>
      <p class="text-gray-700 leading-relaxed text-lg md:text-xl animate-fadeIn delay-150">
        Selamat datang di portal resmi <span class="font-semibold text-primary">PPDB MAN Ambon</span>.<br>
        Daftarkan dirimu untuk menjadi bagian dari madrasah unggulan di Maluku.
      </p>
    <a href="#alur"
   class="inline-block px-8 py-4 text-lg font-bold text-white rounded-full
          bg-gradient-to-r from-blue-500 via-purple-600 to-pink-500
          shadow-[0_0_15px_rgba(99,102,241,0.5)] hover:shadow-[0_0_25px_rgba(139,92,246,0.7)]
          ring-2 ring-blue-300 hover:ring-pink-400
          transition-all duration-300 transform hover:scale-105
          animate-fadeIn delay-300">
    Lihat Alur Pendaftaran
</a>

    </div>

    <!-- Gambar di kanan -->
    <div class="lg:w-1/2 flex justify-center lg:justify-end mb-8 lg:mb-0">
      <div class="w-64 h-64 sm:w-72 sm:h-72 md:w-80 md:h-80 rounded-full overflow-hidden shadow-2xl border-4 border-white transition-transform duration-500 hover:scale-105 hover:shadow-3xl">
        <img src="{{ asset('storage/image/sejarah.jpg') }}" alt="Logo MAN Ambon" class="object-cover w-full h-full">
      </div>
    </div>

  </div>
</section>


<!-- Tailwind custom animation untuk fadeIn -->
<style>
  @layer utilities {
    .animate-fadeIn {
      animation: fadeIn 1s ease-out forwards;
    }
    .animate-fadeIn.delay-150 {
      animation-delay: 0.15s;
    }
    .animate-fadeIn.delay-300 {
      animation-delay: 0.3s;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  }
</style>
