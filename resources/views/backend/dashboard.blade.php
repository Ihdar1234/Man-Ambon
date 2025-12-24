<!DOCTYPE html>
<html lang="en"
      x-data="themeApp()"
      x-init="initTheme()"
      :class="{ 'dark': darkMode }"
      class="h-full bg-gray-100 dark:bg-gray-900 transition-colors duration-300">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Man Ambon' }}</title>

  <!-- Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- Summernote & Trix -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
  @trixassets
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

  <!-- Premium Styles -->
  <style>
    .content-wrapper {
        overflow: visible !important;
        height: auto !important;
    }

    /* Pastikan body hanya punya 1 scroll */
    body {
        overflow-y: auto !important;
        height: auto !important;
    }
    aside {
      background: linear-gradient(180deg, #1e2a78 0%, #27338f 40%, #3240aa 100%);
      color: white;
      transition: width .3s ease, transform .3s ease;
      backdrop-filter: blur(6px);
      box-shadow: 0 4px 20px rgba(0,0,0,.08);
    }
    aside nav a {
      transition: all .3s ease;
      border-radius: 0.75rem;
      padding: 0.5rem 1rem;
      display: flex;
      align-items: center;
    }
    aside nav a:hover {
      background: rgba(255,255,255,.1);
      border-left: 4px solid #FFD700;
      transform: translateX(5px);
      color: #FFD700;
    }

    header {
      background: rgba(255,255,255,.85);
      backdrop-filter: blur(12px) saturate(180%);
      border-bottom: 1px solid rgba(0,0,0,.06);
      box-shadow: 0 4px 15px rgba(0,0,0,.08);
    }

    .card-premium {
      background: white;
      border-radius: 1rem;
      padding: 1.5rem;
      box-shadow: 0 4px 20px rgba(0,0,0,.08);
      transition: all .3s ease;
    }
    .card-premium:hover {
      transform: translateY(-4px);
      box-shadow: 0 6px 25px rgba(0,0,0,.12);
    }

    .btn-premium {
      background: linear-gradient(to right, #6366f1, #8b5cf6, #ec4899);
      color: white;
      font-weight: 600;
      padding: 0.5rem 1.5rem;
      border-radius: 1.5rem;
      box-shadow: 0 4px 15px rgba(139,92,246,.4);
      transition: all .3s ease;
    }
    .btn-premium:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 20px rgba(139,92,246,.6);
    }

    input, textarea {
      border-radius: 0.75rem;
      border: 1px solid rgba(0,0,0,.1);
      padding: 0.5rem 0.75rem;
      transition: all .3s ease;
    }
    input:focus, textarea:focus {
      outline: none;
      box-shadow: 0 0 8px rgba(99,102,241,0.5);
      border-color: #6366f1;
    }

    ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-thumb {
      background: rgba(139,92,246,.5);
      border-radius: 9999px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: rgba(139,92,246,.7);
    }
   .action-btn {
        @apply inline-flex items-center justify-center
               w-12 h-12 text-xl text-white
               rounded-xl transition-all duration-200
               hover:scale-105 active:scale-95;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    /* Tombol Mobile */
    .mobile-btn {
        @apply inline-flex items-center justify-center
               px-4 py-2.5 text-sm font-semibold text-white
               rounded-lg transition-all duration-150 active:scale-95;
        box-shadow: 0 4px 10px rgba(0,0,0,0.06);
    }

    /* Warna tombol */
    .btn-primary { background: var(--color-primary); }
    .btn-primary:hover { background: color-mix(in srgb, var(--color-primary) 85%, black); }

    .btn-warning { background: var(--color-secondary); }
    .btn-warning:hover { background: color-mix(in srgb, var(--color-secondary) 85%, black); }

    .btn-danger { background: #ef4444; }
    .btn-danger:hover { background: #dc2626; }
  </style>
</head>

<body x-data="{ sidebarOpen: true }">

<div class="flex h-screen">

 <!-- MOBILE OVERLAY -->
<div 
    class="fixed inset-0 bg-black/40 z-40 lg:hidden"
    x-show="sidebarOpen"
    @click="sidebarOpen = false"
    x-transition
></div>

  <!-- Sidebar Premium -->
<!-- SIDEBAR PREMIUM -->
<aside 
    class="fixed inset-y-0 left-0 z-50 w-64
           bg-gradient-to-b from-[#1e2a78] via-[#27338f] to-[#3240aa]
           text-white shadow-2xl transition-transform duration-300 ease-in-out
           backdrop-blur-lg"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>
    <!-- HEADER LOGO -->
    <div class="flex items-center justify-between p-4 border-b border-white/10">
        <div class="flex items-center gap-3">
            <img src='{{ asset("storage/image/sejarah.jpg") }}' class="w-10 h-10 rounded-full border border-white/20">
            <h2 class="text-lg font-bold">My App</h2>
        </div>

        <!-- Close Button Mobile Only -->
       <button @click="sidebarOpen = !sidebarOpen"
        class="p-2 rounded-md text-gray-700 dark:text-white hover:bg-gray-200/30 dark:hover:bg-white/10">

    <!-- Icon Menu -->
    <svg x-show="!sidebarOpen" class="h-6 w-6" fill="none" stroke="currentColor">
        <path stroke-linecap="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
    </svg>

    <!-- Icon Close -->
    <svg x-show="sidebarOpen" class="h-6 w-6" fill="none" stroke="currentColor">
        <path stroke-linecap="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
</button>

    </div>

    <!-- NAV -->
    <nav class="p-4 space-y-2">
        <a href="/survei/grafik" class="flex items-center gap-3 nav-link"><i data-lucide="home" class="w-5 h-5"></i>Dashboard</a>
        <a href="/artikel" class="flex items-center gap-3 nav-link"><i data-lucide="file-text" class="w-5 h-5"></i>Tambah Artikel</a>
        <a href="/tambah" class="flex items-center gap-3 nav-link"><i data-lucide="image" class="w-5 h-5"></i>Tambah Galeri</a>
        <a href="/visi-misi" class="flex items-center gap-3 nav-link"><i data-lucide="award" class="w-5 h-5"></i>Visi Misi</a>
        <a href="/struktur" class="flex items-center gap-3 nav-link"><i data-lucide="users" class="w-5 h-5"></i>Struktur Organisasi</a>
        <a href="/kalender" class="flex items-center gap-3 nav-link"><i data-lucide="calendar" class="w-5 h-5"></i>Kalender</a>
        <a href="/pdfs" class="flex items-center gap-3 nav-link"><i data-lucide="book" class="w-5 h-5"></i>Dukman</a>
        <a href="/login/operator" class="flex items-center gap-3 nav-link"><i data-lucide="user-plus" class="w-5 h-5"></i>Tambah Data Guru</a>
    </nav>
</aside>


  <!-- Main Content -->
  <div class="flex-1 flex flex-col transition-all duration-300 ease-in-out" :class="sidebarOpen ? 'lg:ml-64' : 'lg:ml-0'">

    <!-- Header Premium -->
    <header class="flex items-center justify-between px-6 py-3 fixed top-0 left-0 right-0 z-40 bg-white/85 dark:bg-gray-800/85 backdrop-blur-lg border-b border-white/10 shadow-md transition-all duration-300">
      
      <div class="flex items-center gap-2">
        <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md text-gray-700 dark:text-white hover:bg-gray-200/20 dark:hover:bg-white/10 transition">
          <svg x-show="!sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
          <svg x-show="sidebarOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
        <h1 class="text-lg font-bold text-gray-800 dark:text-white">Dashboard</h1>
      </div>

      <div class="flex items-center gap-4">
        <!-- Theme Toggle -->
        <button @click="toggleTheme()" class="p-2 rounded-md text-gray-700 dark:text-white hover:bg-gray-200/20 dark:hover:bg-white/10 transition">
          <template x-if="!darkMode">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m6.364 1.636l-1.414 1.414M21 12h-2m-1.636 6.364l-1.414-1.414M12 21v-2m-6.364-1.636l1.414-1.414M3 12h2m1.636-6.364l1.414 1.414"/>
            </svg>
          </template>
          <template x-if="darkMode">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M17.293 14.293a8 8 0 11-7.586-7.586 6 6 0 107.586 7.586z" clip-rule="evenodd"/>
            </svg>
          </template>
        </button>
        <!-- User Avatar -->
        <img src="https://via.placeholder.com/32" alt="User" class="w-8 h-8 rounded-full border border-gray-300 dark:border-white/20 cursor-pointer">
      </div>
    </header>

    <!-- Page Content -->
  <main class="content-wrapper p-6 overflow-y-auto h-[calc(100vh-80px)]">
    @yield('content')
</main>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
<script>
  function initLucide() {
    if(typeof lucide !== 'undefined'){
      lucide.createIcons({ checkForMutations: true });
    }
  }

  document.addEventListener('DOMContentLoaded', function() {
    initLucide();
  });
</script>

</body>
</html>
