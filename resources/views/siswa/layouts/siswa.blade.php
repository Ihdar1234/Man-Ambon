<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Siswa - PPDB MAN Ambon</title>

  <!-- Tailwind & DaisyUI -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    * { font-family: 'Inter', sans-serif; }
    .transition-all { transition: all 0.3s ease; }
    .nav-active {
      background: linear-gradient(90deg, #3b82f6, #2563eb);
      color: #fff !important;
      font-weight: 600;
      box-shadow: inset 3px 0 0 #93c5fd;
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeUp { animation: fadeUp 0.5s ease-out; }

    /* Scrollbar Sidebar */
    aside::-webkit-scrollbar { width: 6px; }
    aside::-webkit-scrollbar-thumb { background-color: rgba(255,255,255,0.4); border-radius: 3px; }
    aside::-webkit-scrollbar-track { background: rgba(255,255,255,0.1); }
  </style>
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen">

<div class="flex min-h-screen">

  <!-- SIDEBAR -->
  <aside id="sidebar"
    class="fixed z-50 inset-y-0 left-0 w-72 bg-gradient-to-b from-blue-600 to-indigo-700 text-white shadow-2xl border-r border-indigo-400/30 flex flex-col h-full transition-transform transform -translate-x-full md:translate-x-0">

    <!-- LOGO -->
    <div class="p-6 border-b border-white/20 flex items-center gap-3">
      <img src="{{ asset('storage/image/logo.png') }}" class="w-10 h-10 rounded-full shadow-md" alt="Logo">
      <span class="font-bold text-lg text-white drop-shadow-md tracking-wide">PPDB MAN Ambon</span>
    </div>

    <!-- NAVIGATION -->
    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
      <a href="{{ route('siswa.index') }}"
         class="nav-item group flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition-all relative">
        <i data-lucide="layout-dashboard" class="w-5 h-5 text-white/90 group-hover:text-blue-200"></i>
        <span class="text-lg font-medium">Dashboard</span>
      </a>

      <a href="{{ route('siswa.daftar.index') }}"
         class="nav-item group flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition-all relative {{ request()->is('siswa/daftar*') ? 'nav-active' : '' }}">
        <i data-lucide="user-round" class="w-5 h-5 text-white/90 group-hover:text-blue-200"></i>
        <span class="text-lg font-medium">Biodata</span>
      </a>

      <a href="{{ route('siswa.dokumen.index') }}"
         class="nav-item group flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition-all relative">
        <i data-lucide="upload-cloud" class="w-5 h-5 text-white/90 group-hover:text-blue-200"></i>
        <span class="text-lg font-medium">Upload Dokumen</span>
      </a>

      <a href="#"
         class="nav-item group flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition-all relative">
        <i data-lucide="badge-check" class="w-5 h-5 text-white/90 group-hover:text-blue-200"></i>
        <span class="text-lg font-medium">Status Pendaftaran</span>
      </a>

      <a href="#"
         class="nav-item group flex items-center gap-3 p-3 rounded-xl hover:bg-white/20 transition-all relative">
        <i data-lucide="megaphone" class="w-5 h-5 text-white/90 group-hover:text-blue-200"></i>
        <span class="text-lg font-medium">Pengumuman</span>
      </a>
    </nav>

    <!-- LOGOUT BUTTON -->
    <div class="p-4 border-t border-white/20">
      <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?')">
        @csrf
        <button type="submit"
                class="btn w-full bg-red-500 hover:bg-red-600 text-white flex items-center justify-center gap-2 shadow-md transition">
          <i data-lucide="log-out" class="w-4 h-4"></i>
          <span>Logout</span>
        </button>
      </form>
    </div>
  </aside>

  <!-- OVERLAY MOBILE -->
  <div id="overlay" class="fixed inset-0 bg-black/30 z-40 hidden md:hidden" onclick="toggleSidebar()"></div>

  <!-- MAIN CONTENT -->
  <div class="flex-1 md:ml-72 flex flex-col">

    <!-- MOBILE HEADER -->
    <div class="md:hidden flex justify-between items-center p-3 bg-white/80 backdrop-blur-md border-b border-gray-200 z-30 sticky top-0">
      <h1 class="text-xl font-bold text-gray-700">Dashboard Siswa</h1>
      <button onclick="toggleSidebar()" class="p-2 rounded bg-gray-200">
        <i data-lucide="menu" class="w-6 h-6"></i>
      </button>
    </div>

    <!-- DESKTOP HEADER -->
    <header class="hidden md:flex bg-white/80 backdrop-blur-md border-b border-gray-200 px-6 py-3 justify-between items-center sticky top-0 z-20 shadow-sm rounded-b-xl">
      <p class="text-sm text-gray-600">Selamat datang, <strong>{{ Auth::user()->name }}</strong></p>
      <label class="flex items-center gap-2 cursor-pointer">
        <input type="checkbox" id="dark-toggle" onchange="toggleTheme()" class="toggle toggle-primary" />
        <i data-lucide="moon" class="w-5 h-5 text-gray-600"></i>
      </label>
    </header>

    <!-- KONTEN -->
    <main class="p-6 bg-gray-50 flex-1 animate-fadeUp">
      @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="p-4 bg-white border-t text-center text-sm text-gray-500">
      © 2025 PPDB MAN Ambon. Semua hak dilindungi.
    </footer>
  </div>
</div>

<script>
  // Dark mode toggle
  function toggleTheme() {
    const html = document.documentElement;
    const current = html.getAttribute('data-theme');
    const next = current === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-theme', next);
    localStorage.setItem('theme', next);
  }

  // Sidebar mobile toggle
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
  }

  // Load Lucide icons
  document.addEventListener("DOMContentLoaded", function() {
    lucide.createIcons();
  });
</script>
</body>
</html>
