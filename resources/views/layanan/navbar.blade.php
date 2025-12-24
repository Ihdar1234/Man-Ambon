<nav id="navbar" class="fixed top-0 w-full z-50 bg-transparent shadow-md transition-all duration-500">
  <div class="max-w-7xl mx-auto px-5 md:px-8 py-3 flex justify-between items-center">
    <!-- Logo -->
    <a href="#" id="navbarLogo" class="text-2xl md:text-3xl font-extrabold text-white transition-colors duration-500">
      Pelayanan Publik MA
    </a>

    <!-- Desktop Menu -->
    <ul id="desktopMenu" class="hidden md:flex items-center space-x-6 text-white font-medium transition-colors duration-500">
      <li><a href="#hero" class="hover:text-blue-400 transition-colors duration-300">Beranda</a></li>
      <li><a href="#layanan" class="hover:text-purple-400 transition-colors duration-300">Layanan</a></li>
      <li><a href="#informasi" class="hover:text-green-400 transition-colors duration-300">Informasi</a></li>
      <li><a href="#kontak" class="hover:text-red-400 transition-colors duration-300">Kontak</a></li>
    </ul>

    <!-- Mobile Hamburger -->
    <button id="mobileBtn" class="md:hidden p-2 rounded-md text-white hover:bg-white/20 transition-colors duration-300">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="md:hidden overflow-hidden max-h-0 transition-all duration-500 bg-white shadow-lg">
    <ul class="flex flex-col space-y-4 p-6 text-gray-800 font-medium">
      <li><a href="#hero" class="hover:text-blue-600 transition">Beranda</a></li>
      <li><a href="#layanan" class="hover:text-purple-600 transition">Layanan</a></li>
      <li><a href="#informasi" class="hover:text-green-600 transition">Informasi</a></li>
      <li><a href="#kontak" class="hover:text-red-600 transition">Kontak</a></li>
    </ul>
  </div>
</nav>