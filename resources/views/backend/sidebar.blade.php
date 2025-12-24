<aside 
  class="fixed inset-y-0 left-0 w-64 z-50 transform transition-transform duration-300 ease-in-out
         bg-gradient-to-b from-indigo-600/80 via-purple-600/80 to-pink-600/80 
         backdrop-blur-md shadow-lg shadow-black/30 ring-1 ring-white/10"
  :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:-ml-64'"
  x-transition:enter="transition ease-out duration-300"
  x-transition:enter-start="-translate-x-full"
  x-transition:enter-end="translate-x-0"
  x-transition:leave="transition ease-in duration-200"
  x-transition:leave-start="translate-x-0"
  x-transition:leave-end="-translate-x-full">

  <div class="flex items-center justify-between p-4 border-b border-white/10">
    <h2 class="text-xl font-bold text-white">My App</h2>
    <button class="p-2 rounded-md text-white hover:bg-white/20 lg:hidden" 
            @click="sidebarOpen = false">✖</button>
  </div>

  <nav class="p-4 space-y-2">
    {{-- Dashboard --}}
    <a href="/survei/grafik"
       class="{{ request()->is('') ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border bg-yellow-300 border-white/30' : 'block px-4 py-2 text-white/80 hover:bg-yellow-300 border border-white/10 rounded-lg transition-all duration-300 ease-in-out' }}">
       Dashboard
    </a>

    {{-- Data Siswa --}}
    <a href="#"
       class="{{ request()->is('') ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border bg-yellow-300 border-white/30' : 'block px-4 py-2 text-white/80 hover:bg-yellow-300 border border-white/10 rounded-lg transition-all duration-300 ease-in-out' }}">
      Tambah Data Guru
    </a>

    {{-- Tambah Artikel --}}
    <a href="/artikel"
       class="{{ request()->is('') ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border bg-yellow-300 border-white/30' : 'block px-4 py-2 text-white/80 hover:bg-yellow-300 border border-white/10 rounded-lg transition-all duration-300 ease-in-out' }}">
       Tambah Artikel
    </a>

    {{-- Galeri --}}
    <a href="/tambah"
       class="{{ request()->is('') ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border bg-yellow-300 border-white/30' : 'block px-4 py-2 text-white/80 hover:bg-yellow-300 border border-white/10 rounded-lg transition-all duration-300 ease-in-out' }}">
       Tambah Galeri
    </a>
     <a href="/visi-misi"
       class="{{ request()->is('') ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border bg-yellow-300 border-white/30' : 'block px-4 py-2 text-white/80 hover:bg-yellow-300 border border-white/10 rounded-lg transition-all duration-300 ease-in-out' }}">
       Visi Misi
    </a>
      <a href="/struktur"
       class="{{ request()->is('') ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border bg-yellow-300 border-white/30' : 'block px-4 py-2 text-white/80 hover:bg-yellow-300 border border-white/10 rounded-lg transition-all duration-300 ease-in-out' }}">
       Struktur Organisasi
    </a>
      <a href="/kalender"
       class="{{ request()->is('') ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border bg-yellow-300 border-white/30' : 'block px-4 py-2 text-white/80 hover:bg-yellow-300 border border-white/10 rounded-lg transition-all duration-300 ease-in-out' }}">
      Kalender
    </a>
      <a href="/pdfs"
       class="{{ request()->is('') ? 'relative block px-4 py-2 font-semibold text-white rounded-lg border bg-yellow-300 border-white/30' : 'block px-4 py-2 text-white/80 hover:bg-yellow-300 border border-white/10 rounded-lg transition-all duration-300 ease-in-out' }}">
     Dukman
    </a>
  </nav>
</aside>
