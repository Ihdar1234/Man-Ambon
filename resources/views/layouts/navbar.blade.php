<!-- NAVBAR GLOSSY HIJAU -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-green-700/90 backdrop-blur-lg shadow-lg">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16 items-center">

      <!-- LOGO -->
      <div class="flex-shrink-0 text-white font-bold text-xl">
        <a href="/" class="hover:text-yellow-300 transition-colors duration-300">MAN Ambon</a>
      </div>

      <!-- MENU DESKTOP -->
      <div class="hidden md:flex space-x-6 text-white font-medium items-center">
        <a href="/" class="hover:text-yellow-300 transition-colors duration-300">Beranda</a>

        <!-- PROFIL -->
        <div class="relative group">
          <button onclick="toggleDesktopDropdown('profil-desktop')" class="hover:text-yellow-300 flex items-center transition-colors duration-300">
            Profil
            <svg class="w-4 h-4 ml-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="profil-desktop" class="absolute hidden bg-green-700/90 backdrop-blur-md text-white rounded-lg shadow-lg mt-2 w-48 py-2">
            <a href="/visi" class="block px-4 py-2 hover:bg-green-600/80 transition">Visi & Misi</a>
            <a href="/sejarah" class="block px-4 py-2 hover:bg-green-600/80 transition">Sejarah</a>
            <a href="/organisasi" class="block px-4 py-2 hover:bg-green-600/80 transition">Struktur Organisasi</a>
          </div>
        </div>

        <!-- ASESMEN -->
        <div class="relative group">
          <button onclick="toggleDesktopDropdown('asesmen-desktop')" class="hover:text-yellow-300 flex items-center transition-colors duration-300">
            Asesmen
            <svg class="w-4 h-4 ml-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="asesmen-desktop" class="absolute hidden bg-green-700/90 backdrop-blur-md text-white rounded-lg shadow-lg mt-2 w-48 py-2">
            <a href="https://drive.google.com/file/d/1gnGDb8Cj1eV6kPyWlRBcSw1lQhH58GZc/view" class="block px-4 py-2 hover:bg-green-600/80 transition">Hasil Asesmen</a>
            <a href="#" class="block px-4 py-2 hover:bg-green-600/80 transition">Informasi Asesmen</a>
          </div>
        </div>

        <!-- INFORMASI -->
        <div class="relative group">
          <button onclick="toggleDesktopDropdown('informasi-desktop')" class="hover:text-yellow-300 flex items-center transition-colors duration-300">
            Informasi
            <svg class="w-4 h-4 ml-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="informasi-desktop" class="absolute hidden bg-green-700/90 backdrop-blur-md text-white rounded-lg shadow-lg mt-2 w-48 py-2">
            <a href="https://drive.google.com/file/d/1m5YiWyIEJsWQ3JUu530hkoMESfiwm-Dp/view" class="block px-4 py-2 hover:bg-green-600/80 transition">Pengumuman</a>
            <a href="https://drive.google.com/file/d/1IAbrnrEnxdhmqDP5i_j5BBrRPkkpdYsr/view" class="block px-4 py-2 hover:bg-green-600/80 transition">Berita Duk MAN</a>
          </div>
        </div>

        <!-- LAYANAN -->
        <div class="relative group">
          <button onclick="toggleDesktopDropdown('layanan-desktop')" class="hover:text-yellow-300 flex items-center transition-colors duration-300">
            Layanan
            <svg class="w-4 h-4 ml-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="layanan-desktop" class="absolute hidden bg-green-700/90 backdrop-blur-md text-white rounded-lg shadow-lg mt-2 w-56 py-2">
            <a href="/prifiew" class="block px-4 py-2 hover:bg-green-600/80 transition">Kalender Pendidikan</a>
            <a href="#" class="block px-4 py-2 hover:bg-green-600/80 transition">Maklumat</a>
            <a href="/survei" class="block px-4 py-2 hover:bg-green-600/80 transition">Pelayanan Publik</a>
          </div>
        </div>

        <!-- PPDB -->
        <div class="relative group">
          <button onclick="toggleDesktopDropdown('ppdb-desktop')" class="hover:text-yellow-300 flex items-center transition-colors duration-300">
            PPDB
            <svg class="w-4 h-4 ml-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="ppdb-desktop" class="absolute hidden bg-green-700/90 backdrop-blur-md text-white rounded-lg shadow-lg mt-2 w-56 py-2">
            <a href="/siswa/dashboard" class="block px-4 py-2 hover:bg-green-600/80 transition">Pendaftaran</a>
            <a href="https://drive.google.com/file/d/1Tn5Qbx0g6_-zViaxQX2EuTMZdz0MJica/view" class="block px-4 py-2 hover:bg-green-600/80 transition">Hasil Pendaftaran</a>
            <a href="https://drive.google.com/file/d/1lZOEZiFaRzOhycmjRBKEUsL3UCyHNWoR/view" class="block px-4 py-2 hover:bg-green-600/80 transition">Informasi PPDB</a>
          </div>
        </div>

        <!-- APLIKASI -->
        <div class="relative group">
          <button onclick="toggleDesktopDropdown('aplikasi-desktop')" class="hover:text-yellow-300 flex items-center transition-colors duration-300">
            Aplikasi
            <svg class="w-4 h-4 ml-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <div id="aplikasi-desktop" class="absolute hidden bg-green-700/90 backdrop-blur-md text-white rounded-lg shadow-lg mt-2 w-56 py-2">
            <a href="https://rdm.manoneambon.sch.id/" class="block px-4 py-2 hover:bg-green-600/80 transition">Raport Digital</a>
            <a href="https://cbt-manoneambon.sch.id/" class="block px-4 py-2 hover:bg-green-600/80 transition">CBT</a>
          </div>
        </div>

        <a href="#" class="hover:text-yellow-300 transition-colors duration-300">Sarpras</a>
        <a href="#" class="hover:text-yellow-300 transition-colors duration-300">Direktori</a>
        <a href="#" class="hover:text-yellow-300 transition-colors duration-300">Kontak</a>
      </div>

      <!-- TOGGLE MOBILE -->
      <div class="md:hidden">
        <button onclick="toggleMobileMenu()" class="text-white text-2xl font-bold focus:outline-none hover:text-yellow-300 transition-colors duration-300">
          ☰
        </button>
      </div>
    </div>
  </div>

  <!-- MENU MOBILE -->
<!-- MENU MOBILE -->
<div id="nav-menu" class="hidden md:hidden bg-green-700/90 backdrop-blur-md max-h-[80vh] overflow-y-auto transition-all duration-300">
  <div class="px-4 py-3 space-y-2">

    <a href="/" class="block hover:text-yellow-300 transition-colors duration-300">Beranda</a>

    <!-- Dropdown Mobile Profil -->
    <div>
      <button class="w-full text-left flex justify-between items-center py-2 hover:text-yellow-300 transition-colors duration-300" onclick="toggleDropdown('profil-dropdown')">
        Profil
        <svg class="w-4 h-4 ml-1 transition-transform duration-300" id="profil-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div id="profil-dropdown" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out pl-4 space-y-2">
        <a href="/visi" class="block hover:text-yellow-300 transition-colors duration-300">Visi & Misi</a>
        <a href="/sejarah" class="block hover:text-yellow-300 transition-colors duration-300">Sejarah</a>
        <a href="/organisasi" class="block hover:text-yellow-300 transition-colors duration-300">Struktur Organisasi</a>
      </div>
    </div>

    <!-- Dropdown Mobile Asesmen -->
    <div>
      <button class="w-full text-left flex justify-between items-center py-2 hover:text-yellow-300 transition-colors duration-300" onclick="toggleDropdown('asesmen-dropdown')">
        Asesmen
        <svg class="w-4 h-4 ml-1 transition-transform duration-300" id="asesmen-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div id="asesmen-dropdown" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out pl-4 space-y-2">
        <a href="https://drive.google.com/file/d/1gnGDb8Cj1eV6kPyWlRBcSw1lQhH58GZc/view" class="block hover:text-yellow-300 transition-colors duration-300">Hasil Asesmen</a>
        <a href="#" class="block hover:text-yellow-300 transition-colors duration-300">Informasi Asesmen</a>
      </div>
    </div>

    <!-- Dropdown Mobile Informasi -->
    <div>
      <button class="w-full text-left flex justify-between items-center py-2 hover:text-yellow-300 transition-colors duration-300" onclick="toggleDropdown('informasi-dropdown')">
        Informasi
        <svg class="w-4 h-4 ml-1 transition-transform duration-300" id="informasi-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div id="informasi-dropdown" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out pl-4 space-y-2">
        <a href="https://drive.google.com/file/d/1m5YiWyIEJsWQ3JUu530hkoMESfiwm-Dp/view" class="block hover:text-yellow-300 transition-colors duration-300">Pengumuman</a>
        <a href="https://drive.google.com/file/d/1IAbrnrEnxdhmqDP5i_j5BBrRPkkpdYsr/view" class="block hover:text-yellow-300 transition-colors duration-300">Berita Duk MAN</a>
      </div>
    </div>

    <!-- Dropdown Mobile Layanan -->
    <div>
      <button class="w-full text-left flex justify-between items-center py-2 hover:text-yellow-300 transition-colors duration-300" onclick="toggleDropdown('layanan-dropdown')">
        Layanan
        <svg class="w-4 h-4 ml-1 transition-transform duration-300" id="layanan-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div id="layanan-dropdown" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out pl-4 space-y-2">
        <a href="/prifiew" class="block hover:text-yellow-300 transition-colors duration-300">Kalender Pendidikan</a>
        <a href="#" class="block hover:text-yellow-300 transition-colors duration-300">Maklumat</a>
        <a href="/survei" class="block hover:text-yellow-300 transition-colors duration-300">Pelayanan Publik</a>
      </div>
    </div>

    <!-- Dropdown Mobile PPDB -->
    <div>
      <button class="w-full text-left flex justify-between items-center py-2 hover:text-yellow-300 transition-colors duration-300" onclick="toggleDropdown('ppdb-dropdown')">
        PPDB
        <svg class="w-4 h-4 ml-1 transition-transform duration-300" id="ppdb-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div id="ppdb-dropdown" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out pl-4 space-y-2">
        <a href="/siswa/dashboard" class="block hover:text-yellow-300 transition-colors duration-300">Pendaftaran</a>
        <a href="https://drive.google.com/file/d/1Tn5Qbx0g6_-zViaxQX2EuTMZdz0MJica/view" class="block hover:text-yellow-300 transition-colors duration-300">Hasil Pendaftaran</a>
        <a href="https://drive.google.com/file/d/1lZOEZiFaRzOhycmjRBKEUsL3UCyHNWoR/view" class="block hover:text-yellow-300 transition-colors duration-300">Informasi PPDB</a>
      </div>
    </div>

    <!-- Dropdown Mobile Aplikasi -->
    <div>
      <button class="w-full text-left flex justify-between items-center py-2 hover:text-yellow-300 transition-colors duration-300" onclick="toggleDropdown('aplikasi-dropdown')">
        Aplikasi
        <svg class="w-4 h-4 ml-1 transition-transform duration-300" id="aplikasi-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div id="aplikasi-dropdown" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out pl-4 space-y-2">
        <a href="https://rdm.manoneambon.sch.id/" class="block hover:text-yellow-300 transition-colors duration-300">Raport Digital</a>
        <a href="https://cbt-manoneambon.sch.id/" class="block hover:text-yellow-300 transition-colors duration-300">CBT</a>
      </div>
    </div>

    <!-- Menu non-dropdown -->
    <a href="#" class="block py-2 hover:text-yellow-300 transition-colors duration-300">Sarpras</a>
    <a href="#" class="block py-2 hover:text-yellow-300 transition-colors duration-300">Direktori</a>
    <a href="#" class="block py-2 hover:text-yellow-300 transition-colors duration-300">Kontak</a>

  </div>
</div>

</nav>

<script>
  // Toggle Mobile Menu
  function toggleMobileMenu() {
    document.getElementById('nav-menu').classList.toggle('hidden');
  }

  // Toggle Mobile Dropdown
  function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    dropdown.classList.toggle('max-h-0');
    dropdown.classList.toggle('max-h-40');
  }

  // Toggle Desktop Dropdown
  function toggleDesktopDropdown(id) {
    const dropdown = document.getElementById(id);
    const allDropdowns = document.querySelectorAll('[id$="-desktop"]');
    allDropdowns.forEach(el => { if (el.id !== id) el.classList.add('hidden'); });
    dropdown.classList.toggle('hidden');
  }

  // Close desktop dropdown if click outside
  document.addEventListener('click', function (e) {
    const isDropdownButton = e.target.closest('button');
    if (!isDropdownButton) {
      document.querySelectorAll('[id$="-desktop"]').forEach(el => el.classList.add('hidden'));
    }
  });
</script>
