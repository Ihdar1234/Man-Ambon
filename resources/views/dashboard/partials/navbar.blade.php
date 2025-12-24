<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-500 bg-transparent backdrop-blur-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
    <!-- Logo dengan glow -->
    <a href="#" class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 drop-shadow-lg">
      MAN Ambon
    </a>

    <!-- Desktop Menu -->
    <ul class="hidden md:flex items-center space-x-6 text-gray-700 font-medium">
      <li>
        <a href="#hero" class="relative px-3 py-2 rounded-md hover:text-blue-500 transition-all duration-300 group">
          Home
          <span class="absolute bottom-0 left-0 w-0 h-1 bg-blue-500 transition-all duration-300 group-hover:w-full rounded"></span>
        </a>
      </li>
      <li>
        <a href="#alur" class="relative px-3 py-2 rounded-md hover:text-purple-500 transition-all duration-300 group">
          Alur
          <span class="absolute bottom-0 left-0 w-0 h-1 bg-purple-500 transition-all duration-300 group-hover:w-full rounded"></span>
        </a>
      </li>
      <li>
        <a href="#informasi" class="relative px-3 py-2 rounded-md hover:text-green-500 transition-all duration-300 group">
          Informasi
          <span class="absolute bottom-0 left-0 w-0 h-1 bg-green-500 transition-all duration-300 group-hover:w-full rounded"></span>
        </a>
      </li>
      <li>
        <a href="#syarat" class="relative px-3 py-2 rounded-md hover:text-yellow-500 transition-all duration-300 group">
          Syarat
          <span class="absolute bottom-0 left-0 w-0 h-1 bg-yellow-500 transition-all duration-300 group-hover:w-full rounded"></span>
        </a>
      </li>
      <li>
        <a href="#kontak" class="relative px-3 py-2 rounded-md hover:text-red-500 transition-all duration-300 group">
          Kontak
          <span class="absolute bottom-0 left-0 w-0 h-1 bg-red-500 transition-all duration-300 group-hover:w-full rounded"></span>
        </a>
      </li>

      <!-- Tombol Login -->
      <li>
        <a href="/login/siswa" class="ml-4 px-5 py-2 rounded-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold shadow-lg transition-all duration-300 hover:from-purple-600 hover:to-blue-500 hover:shadow-2xl hover:scale-105">
          Login
        </a>
      </li>
    </ul>

    <!-- Mobile Hamburger -->
    <div class="md:hidden flex items-center gap-2">
      <a href="/login" class="btn btn-sm btn-primary">
        <i class="fa-solid fa-right-to-bracket mr-1"></i> Login
      </a>
      <button id="menu-btn" class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu dengan slide & glow -->
  <div id="mobile-menu" class="hidden md:hidden bg-white/90 backdrop-blur-lg shadow-lg transition-transform duration-500 transform -translate-y-5 opacity-0">
    <ul class="flex flex-col space-y-4 p-6 text-gray-700 font-medium">
      <li><a href="#hero" class="hover:text-blue-500 transition-all duration-300">Home</a></li>
      <li><a href="#alur" class="hover:text-purple-500 transition-all duration-300">Alur</a></li>
      <li><a href="#informasi" class="hover:text-green-500 transition-all duration-300">Informasi</a></li>
      <li><a href="#syarat" class="hover:text-yellow-500 transition-all duration-300">Syarat</a></li>
      <li><a href="#kontak" class="hover:text-red-500 transition-all duration-300">Kontak</a></li>
      <li><a href="/login" class="btn btn-primary btn-block mt-2">Login</a></li>
    </ul>
  </div>
</nav>

<script>
  const menuBtn = document.getElementById('menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');

  menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
    if(!mobileMenu.classList.contains('hidden')) {
      mobileMenu.classList.remove('-translate-y-5', 'opacity-0');
      mobileMenu.classList.add('translate-y-0', 'opacity-100');
    } else {
      mobileMenu.classList.add('-translate-y-5', 'opacity-0');
      mobileMenu.classList.remove('translate-y-0', 'opacity-100');
    }
  });

  // Navbar shadow & background saat scroll
  window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('shadow-xl', 'bg-white/95');
    } else {
      navbar.classList.remove('shadow-xl', 'bg-white/95');
    }
  });
</script>
