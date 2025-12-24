<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pelayanan Publik - MAN Ambon</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>

 <style>
/* ===== FONT & BODY ===== */
* { font-family: 'Inter', sans-serif; }
body { scroll-behavior: smooth; background-color: #f5f5f7; color: #111827; }

/* ===== NAVBAR PREMIUM ===== */
#navbar { 
    transition: all 0.3s ease-in-out; 
    backdrop-filter: blur(12px);
}
#navbar.scrolled {
    background: rgba(255,255,255,0.95);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}

/* Navbar text */
#navbarLogo, #desktopMenu a {
    transition: color 0.3s ease;
}
#navbar.scrolled #navbarLogo,
#navbar.scrolled #desktopMenu a { color: #111827; }

/* ===== INPUT PREMIUM ===== */
input.input, select.select, .file-input {
    border-width: 2px !important;
    border-color: #6366f1 !important;
    border-radius: 1rem;
    padding: .5rem .75rem;
    background-color: #fff;
    color: #111827;
    transition: all .3s ease;
}
input.input:focus, select.select:focus, .file-input:focus {
    outline: none;
    border-color: #4f46e5 !important;
    box-shadow: 0 0 15px rgba(79,70,229,0.2);
}

/* ===== HERO PREMIUM ===== */
#hero {
    background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%);
    overflow: hidden;
    position: relative;
}
#hero h1 {
    text-shadow: 0 4px 15px rgba(0,0,0,0.2);
    background-clip: text;
    color: transparent;
    background-image: linear-gradient(90deg, #facc15, #ec4899, #8b5cf6);
}
#hero p {
    text-shadow: 0 2px 8px rgba(0,0,0,0.15);
    transition: all 0.5s ease;
}

/* Buttons premium */
.btn-primary {
    background: linear-gradient(90deg, #facc15, #ec4899, #8b5cf6);
    color: #fff;
    font-weight: 600;
    box-shadow: 0 8px 25px rgba(236,72,153,0.3);
    transition: all 0.35s ease;
}
.btn-primary:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 12px 35px rgba(236,72,153,0.4);
}

/* Outline button */
.btn-outline {
    border: 2px solid rgba(255,255,255,0.8);
    color: #fff;
    backdrop-filter: blur(6px);
}
.btn-outline:hover {
    background: rgba(255,255,255,0.1);
    transform: scale(1.05);
}

/* ===== CARD HOVER PREMIUM ===== */
.card-hover:hover {
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    transform: translateY(-5px);
    transition: all 0.3s ease;
}

/* ===== LOGO CIRCLE ===== */
.group .w-72, .group .w-80 {
    border-radius: 50%;
    border: 6px solid rgba(255,255,255,0.5);
    box-shadow: 0 25px 60px rgba(0,0,0,0.2);
    transition: all 0.5s ease;
}
.group:hover .w-72, .group:hover .w-80 {
    transform: scale(1.12);
    box-shadow: 0 35px 70px rgba(0,0,0,0.25);
}

/* ===== DECORATIVE CIRCLES ===== */
.animate-pulse-slow {
    animation: pulse-slow 10s ease-in-out infinite;
}
@keyframes pulse-slow {
  0%,100% { transform: scale(1); opacity:0.6; }
  50% { transform: scale(1.05); opacity:0.4; }
}

/* Glow text */
.glow-text {
    text-shadow: 0 0 10px rgba(255,255,255,0.4),
                 0 0 20px rgba(255,200,50,0.3),
                 0 0 30px rgba(236,72,153,0.2);
}

/* Hero image shadow */
#hero img {
    box-shadow: 0 25px 60px rgba(0,0,0,0.2);
    transition: transform 0.5s ease, box-shadow 0.5s ease;
}
#hero img:hover {
    transform: scale(1.08);
    box-shadow: 0 35px 70px rgba(0,0,0,0.25);
}

/* ===== ANIMASI SCROLL ELEMENT ===== */
[data-aos] {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease-out;
}
[data-aos].aos-animate {
    opacity: 1;
    transform: translateY(0);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    #hero h1 { font-size: 2.5rem; }
    #hero p { font-size: 1rem; }
}
</style>

<script>
// ===== NAVBAR SCROLL EFFECT PREMIUM =====
document.addEventListener('DOMContentLoaded', () => {
  const navbar = document.getElementById('navbar');
  const navbarLogo = document.getElementById('navbarLogo');
  const desktopMenu = document.getElementById('desktopMenu');
  const mobileBtn = document.getElementById('mobileBtn');
  const mobileMenu = document.getElementById('mobileMenu');

  // Scroll effect
  window.addEventListener('scroll', () => {
    if(window.scrollY > 50){
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  // Mobile menu toggle
  mobileBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('max-h-0');
    mobileMenu.classList.toggle('max-h-[500px]');
  });

  // Close mobile menu when link clicked
  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.add('max-h-0');
      mobileMenu.classList.remove('max-h-[500px]');
    });
  });
});
</script>

</head>

<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100">

<!-- NAVBAR -->
@include('layanan.navbar')


<!-- HERO -->
<section id="hero" class="relative w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white overflow-hidden py-24 px-6">
  <!-- Decorative Circles -->
  <div class="absolute -top-40 -left-40 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl animate-pulse-slow"></div>
  <div class="absolute -bottom-40 -right-40 w-[28rem] h-[28rem] bg-blue-400/20 rounded-full blur-3xl animate-pulse-slow"></div>

  <div class="relative z-10 max-w-6xl mx-auto flex flex-col-reverse md:flex-row items-center md:items-center gap-12">
    
    <!-- Hero Text -->
    <div class="text-center md:text-left flex-1 space-y-6">
      <h1 data-aos="fade-up"
          class="text-4xl md:text-5xl font-extrabold tracking-tight leading-snug bg-clip-text text-transparent 
                 bg-gradient-to-r from-yellow-300 via-pink-400 to-purple-500 drop-shadow-lg glow-text">
        Portal Pelayanan Publik <br> MAN Ambon
      </h1>
      <p data-aos="fade-up" data-aos-delay="150"
         class="text-white/90 text-base md:text-lg leading-relaxed drop-shadow-md">
        Semua layanan PTSP tersedia di satu platform, cepat, transparan, dan aman. <br>
        Pengajuan surat, izin kegiatan, informasi akademik, dan pengaduan siswa online.
      </p>
      <!-- Buttons -->
      <div data-aos="fade-up" data-aos-delay="300" class="flex flex-wrap justify-center md:justify-start gap-4 mt-4">
        <button id="openFormBtn"
                class="btn btn-primary btn-lg rounded-xl px-8 py-3 shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 hover:scale-105 glow-button">
          Ajukan Layanan
        </button>
        <a href="#layanan"
           class="btn btn-outline text-white border-white rounded-xl hover:bg-white/10 transition px-6 py-3 glow-button">
          Lihat Layanan
        </a>
      </div>
    </div>

<div class="relative flex-shrink-0 group">
  <!-- Logo -->
  <div class="w-72 h-72 md:w-80 md:h-80 rounded-full overflow-hidden border-4 border-white shadow-3xl transition-transform duration-500 hover:scale-110 hover:shadow-4xl">
    <img src="{{ asset('storage/image/sejarah.jpg') }}" alt="Logo MAN Ambon" class="object-cover w-full h-full rounded-full">
  </div>

  <!-- Circular Text Premium Animasi tanpa Glow -->
  <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 760 760">
    <defs>
      <!-- Gradient Teks -->
      <linearGradient id="textGradient" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop offset="0%" stop-color="#facc15"/>
        <stop offset="50%" stop-color="#ec4899"/>
        <stop offset="100%" stop-color="#8b5cf6"/>
      </linearGradient>

      <!-- Path Lingkaran dengan radius 360 -->
      <path id="circlePath" d="M380,380 m-360,0 a360,360 0 1,1 720,0 a360,360 0 1,1 -720,0" />
    </defs>

    <!-- Layer Teks Utama Berputar -->
    <text font-size="24" font-weight="bold" letter-spacing="2" text-anchor="middle" dominant-baseline="middle" fill="url(#textGradient)">
      <textPath xlink:href="#circlePath" startOffset="0%">
        Pelayanan Terpadu Satu Pintu • Cepat • Transparan • Aman •
        <animate attributeName="startOffset" values="0%;100%" dur="35s" repeatCount="indefinite" />
      </textPath>
    </text>

    <!-- Efek Gelombang Halus Layer Kedua -->
    <text font-size="24" font-weight="bold" letter-spacing="2" text-anchor="middle" dominant-baseline="middle" fill="url(#textGradient)" opacity="0.3">
      <textPath xlink:href="#circlePath" startOffset="0%">
        Pelayanan Terpadu Satu Pintu • Cepat • Transparan • Aman •
        <animateTransform attributeName="transform" type="rotate" from="0 380 380" to="360 380 380" dur="60s" repeatCount="indefinite" />
      </textPath>
    </text>
  </svg>
</div>


  </div>
</section>


<!-- MAIN -->
<main class="max-w-6xl mx-auto p-6 -mt-10 space-y-8">
  @yield('content')
</main>

@include('layanan.footer')

<!-- SCRIPTS -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const navbar = document.getElementById('navbar');
  const navbarLogo = document.getElementById('navbarLogo');
  const desktopMenu = document.getElementById('desktopMenu');
  const mobileBtn = document.getElementById('mobileBtn');
  const mobileMenu = document.getElementById('mobileMenu');

  // Scroll effect
  window.addEventListener('scroll', () => {
    if(window.scrollY > 50){
      navbar.classList.remove('bg-transparent');
      navbar.classList.add('bg-white', 'shadow-xl');
      // Teks jadi gelap
      navbarLogo.classList.remove('text-white');
      navbarLogo.classList.add('text-gray-800');
      desktopMenu.classList.remove('text-white');
      desktopMenu.classList.add('text-gray-800');
      // Hover warna tetap
    } else {
      navbar.classList.remove('bg-white', 'shadow-xl');
      navbar.classList.add('bg-transparent');
      // Teks putih
      navbarLogo.classList.remove('text-gray-800');
      navbarLogo.classList.add('text-white');
      desktopMenu.classList.remove('text-gray-800');
      desktopMenu.classList.add('text-white');
    }
  });

  // Mobile menu toggle
  mobileBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('max-h-0');
    mobileMenu.classList.toggle('max-h-[500px]');
  });

  // Close mobile menu when link clicked
  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.add('max-h-0');
      mobileMenu.classList.remove('max-h-[500px]');
    });
  });
});
</script>
</body>
</html>
